<?php

namespace Zfecommerce\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class EavEntityTypeTable
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
    public function getEavEntityType($id) {
        $id = (int)$id;
        $rowSet = $this->tableGateway->select(['entity_type_id' => $id]);
        $row = $rowSet->current();
        if(!$row) {
            throw new RuntimeException("Could not find row with identifier $id");
        }
        return $row;
    }

    /**
     * @param CategoryEntity $categoryEntity
     */
    public function saveEavEntityType(EavEntityType $eavEntityType) {
        $data = [
            'entity_type_code' => $eavEntityType->entity_type_code,
            'entity_type_id' => $eavEntityType->entity_type_id,
            'entity_label' => $eavEntityType->entity_label,
        ];
        $id = (int)$eavEntityType->entity_type_id;
        if($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        if(!$this->getEavEntityType($id)) {
            throw new RuntimeException("Cannot update album with identifier $id; does not exist");
        }
        $this->tableGateway->update($data, ['entity_type_id' => $id]);
    }

    /**
     * @param int $id
     */
    public function deleteEavEntityType($id) {
        $this->tableGateway->delete(['entity_type_id' => $id]);
    }
}

























