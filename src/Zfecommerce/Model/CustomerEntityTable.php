<?php

namespace Zfecommerce\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class CustomerEntityTable
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
    public function getCustomerEntity($id) {
        $id = (int)$id;
        $rowSet = $this->tableGateway->select(['entity_id' => $id]);
        $row = $rowSet->current();
        if(!$row) {
            throw new RuntimeException("Could not find row with identifier $id");
        }
        return $row;
    }
    public function saveCustomerEntity(CustomerEntity $customerEntity) {
        $data = [
            'entity_id' => $customerEntity->entity_id,
            'entity_type_id' => $customerEntity->entity_type_id,
            'email' => $customerEntity->email,
            'created_at' => $customerEntity->created_at,
            'updated_at' => $customerEntity->updated_at,
            'is_active' => $customerEntity->is_active,
        ];
        $id = (int)$customerEntity->entity_id;
        if($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        if(!$this->getCustomerEntity($id)) {
            throw new RuntimeException("Cannot update album with identifier $id; does not exist");
        }
        $this->tableGateway->update($data, ['entity_id' => $id]);
    }

    /**
     * @param int $id
     */
    public function deleteCustomerEntity($id) {
        $this->tableGateway->delete(['entity_id' => $id]);
    }
}

























