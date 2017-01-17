<?php

namespace Zfecommerce\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class EavAttributeValueVarcharTable
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
    public function getEavAttributeValueVarchar($id) {
        $id = (int)$id;
        $rowSet = $this->tableGateway->select(['value_id' => $id]);
        $row = $rowSet->current();
        if(!$row) {
            throw new RuntimeException("Could not find row with identifier $id");
        }
        return $row;
    }
    public function saveEavAttributeValueVarchar(EavAttributeValueVarchar $eavAttributeValueVarchar) {
        $data = [
            'value_id' => $eavAttributeValueVarchar->value_id,
            'entity_id' => $eavAttributeValueVarchar->entity_id,
            'entity_type_id' => $eavAttributeValueVarchar->entity_type_id,
            'attribute_id' => $eavAttributeValueVarchar->attribute_id,
            'value' => $eavAttributeValueVarchar->value,
        ];
        $id = (int)$eavAttributeValueVarchar->value_id;
        if($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        if(!$this->getEavAttributeValueVarchar($id)) {
            throw new RuntimeException("Cannot update album with identifier $id; does not exist");
        }
        $this->tableGateway->update($data, ['value_id' => $id]);
    }

    /**
     * @param int $id
     */
    public function deleteEavAttributeValueVarchar($id) {
        $this->tableGateway->delete(['value_id' => $id]);
    }
}

























