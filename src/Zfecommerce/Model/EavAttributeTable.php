<?php

namespace Zfecommerce\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class EavAttributeTable
{

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    /**
     *
     */
    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    /**
     * @param int $id
     */
    public function getEavAttribute($id)
    {
        $id = (int)$id;
        $rowSet = $this->tableGateway->select(['attribute_id' => $id]);
        $row = $rowSet->current();
        if (!$row) {
            throw new RuntimeException("Could not find row with identifier $id");
        }
        return $row;
    }

    public function saveEavAttribute(EavAttribute $eavAttribute)
    {
        $data = [
            'attribute_id' => $eavAttribute->attribute_id,
            'entity_id' => $eavAttribute->entity_id,
            'entity_type_id' => $eavAttribute->entity_type_id,
            'attribute_code' => $eavAttribute->attribute_code,
            'backend_type' => $eavAttribute->backend_type,
            'backend_table' => $eavAttribute->backend_table,
            'frontend_input' => $eavAttribute->frontend_input,
            'frontend_label' => $eavAttribute->frontend_label,
            'is_visible' => $eavAttribute->is_visible,
            'is_required' => $eavAttribute->is_required,
            'default_value' => $eavAttribute->default_value,
            'is_searchable' => $eavAttribute->is_searchable,
            'is_filterable' => $eavAttribute->is_filterable,
            'is_comparable' => $eavAttribute->is_comparable,
            'is_visible_on_front' => $eavAttribute->is_visible_on_front,
            'is_unique' => $eavAttribute->is_unique,
            'used_in_product_listing' => $eavAttribute->used_in_product_listing,
            'used_for_sort_by' => $eavAttribute->used_for_sort_by,
            'note' => $eavAttribute->note,
            'is_visible_in_advanced_search' => $eavAttribute->is_visible_in_advanced_search,
        ];
        $id = (int)$eavAttribute->attribute_id;
        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        if (!$this->getEavAttribute($id)) {
            throw new RuntimeException("Cannot update album with identifier $id; does not exist");
        }
        $this->tableGateway->update($data, ['attribute_id' => $id]);
    }

    /**
     * @param int $id
     */
    public function deleteEavAttribute($id)
    {
        $this->tableGateway->delete(['attribute_id' => $id]);
    }
}

























