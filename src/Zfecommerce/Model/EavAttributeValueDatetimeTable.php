<?php

namespace Zfecommerce\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class EavAttributeValueDatetimeTable
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
    public function getEavAttributeValueDatetime($id) {
        $id = (int)$id;
        $rowSet = $this->tableGateway->select(['value_id' => $id]);
        $row = $rowSet->current();
        if(!$row) {
            throw new RuntimeException("Could not find row with identifier $id");
        }
        return $row;
    }
    public function saveEavAttributeValueDatetime(EavAttributeValueDatetime $eavAttributeValueDatetime) {
        $data = [
            'value_id' => $eavAttributeValueDatetime->value_id,
            'entity_id' => $eavAttributeValueDatetime->entity_id,
            'entity_type_id' => $eavAttributeValueDatetime->entity_type_id,
            'attribute_id' => $eavAttributeValueDatetime->attribute_id,
            'value' => $eavAttributeValueDatetime->value,
        ];
        $id = (int)$eavAttributeValueDatetime->value_id;
        if($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        if(!$this->getEavAttributeValueDatetime($id)) {
            throw new RuntimeException("Cannot update album with identifier $id; does not exist");
        }
        $this->tableGateway->update($data, ['value_id' => $id]);
    }

    /**
     * @param int $id
     */
    public function deleteEavAttributeValueDatetime($id) {
        $this->tableGateway->delete(['value_id' => $id]);
    }
}

























