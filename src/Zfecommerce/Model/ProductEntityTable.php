<?php

namespace Zfecommerce\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class ProductEntityTable
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
    public function getProductEntity($id) {
        $id = (int)$id;
        $rowSet = $this->tableGateway->select(['entity_id' => $id]);
        $row = $rowSet->current();
        if(!$row) {
            throw new RuntimeException("Could not find row with identifier $id");
        }
        return $row;
    }
    public function saveProductEntity(ProductEntity $productEntity) {
        $data = [
            'entity_id' => $productEntity->entity_id,
            'entity_type_id' => $productEntity->entity_type_id,
            'product_key' => $productEntity->product_key,
            'category_ids' => $productEntity->category_ids,
            'created_at' => $productEntity->created_at,
            'updated_at' => $productEntity->updated_at,
        ];
        $id = (int)$productEntity->entity_id;
        if($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        if(!$this->getProductEntity($id)) {
            throw new RuntimeException("Cannot update album with identifier $id; does not exist");
        }
        $this->tableGateway->update($data, ['entity_id' => $id]);
    }

    /**
     * @param int $id
     */
    public function deleteProductEntity($id) {
        $this->tableGateway->delete(['entity_id' => $id]);
    }
}

























