<?php

namespace Zfecommerce\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class EavAttributeValueIntTable
{

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    /**
     *
     */
    public function fetchAll() {
        return $this->tableGateway->select();
    }

    /**
     * @param int $id
     */
    public function getEavAttributeValueInt($id) {
        $id = (int)$id;
        $rowSet = $this->tableGateway->select(['value_id' => $id]);
        $row = $rowSet->current();
        if(!$row) {
            throw new RuntimeException("Could not find row with identifier $id");
        }
        return $row;
    }
    public function saveEavAttributeValueInt(EavAttributeValueInt $eavAttributeValueInt) {
        $data = [
            'value_id' => $eavAttributeValueInt->value_id,
            'entity_id' => $eavAttributeValueInt->entity_id,
            'entity_type_id' => $eavAttributeValueInt->entity_type_id,
            'attribute_id' => $eavAttributeValueInt->attribute_id,
            'value' => $eavAttributeValueInt->value,
        ];
        $id = (int)$eavAttributeValueInt->value_id;
        if($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        if(!$this->getEavAttributeValueInt($id)) {
            throw new RuntimeException("Cannot update album with identifier $id; does not exist");
        }
        $this->tableGateway->update($data, ['value_id' => $id]);
    }

    /**
     * @param int $id
     */
    public function deleteEavAttributeValueInt($id) {
        $this->tableGateway->delete(['value_id' => $id]);
    }
}

























