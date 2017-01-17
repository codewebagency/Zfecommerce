<?php

namespace Zfecommerce\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class CategoryEntityTable
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
    public function getCategoryEntity($id) {
        $id = (int)$id;
        $rowSet = $this->tableGateway->select(['entity_id' => $id]);
        $row = $rowSet->current();
        if(!$row) {
            throw new RuntimeException("Could not find row with identifier $id");
        }
        return $row;
    }
    public function saveCategoryEntity(CategoryEntity $categoryEntity) {
        $data = [
            'entity_id' => $categoryEntity->entity_id,
            'entity_type_id' => $categoryEntity->entity_type_id,
            'parent_id' => $categoryEntity->parent_id,
            'created_at' => $categoryEntity->created_at,
            'updated_at' => $categoryEntity->updated_at,
            'path' => $categoryEntity->path,
            'level' => $categoryEntity->level,
            'children_count' => $categoryEntity->children_count,
        ];
        $id = (int)$categoryEntity->entity_id;
        if($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        if(!$this->getCategoryEntity($id)) {
            throw new RuntimeException("Cannot update album with identifier $id; does not exist");
        }
        $this->tableGateway->update($data, ['entity_id' => $id]);
    }

    /**
     * @param int $id
     */
    public function deleteCategoryEntity($id) {
        $this->tableGateway->delete(['entity_id' => $id]);
    }
}

























