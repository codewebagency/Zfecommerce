<?php

namespace Zfecommerce\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class EavAttributeValueFloatTable
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
    public function getEavAttributeValueFloat($id) {
        $id = (int)$id;
        $rowSet = $this->tableGateway->select(['value_id' => $id]);
        $row = $rowSet->current();
        if(!$row) {
            throw new RuntimeException("Could not find row with identifier $id");
        }
        return $row;
    }
    public function saveEavAttributeValueFloat(EavAttributeValueFloat $eavAttributeValueFloat) {
        $data = [
            'value_id' => $eavAttributeValueFloat->value_id,
            'entity_id' => $eavAttributeValueFloat->entity_id,
            'entity_type_id' => $eavAttributeValueFloat->entity_type_id,
            'attribute_id' => $eavAttributeValueFloat->attribute_id,
            'value' => $eavAttributeValueFloat->value,
        ];
        $id = (int)$eavAttributeValueFloat->value_id;
        if($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        if(!$this->getEavAttributeValueFloat($id)) {
            throw new RuntimeException("Cannot update album with identifier $id; does not exist");
        }
        $this->tableGateway->update($data, ['value_id' => $id]);
    }

    /**
     * @param int $id
     */
    public function deleteEavAttributeValueFloat($id) {
        $this->tableGateway->delete(['value_id' => $id]);
    }
}

























