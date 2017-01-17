<?php

namespace Zfecommerce\Model;

class EavAttribute
{
    public $attribute_id;
    public $entity_id;
    public $entity_type_id;
    public $attribute_code;
    public $backend_type;
    public $backend_table;
    public $frontend_input;
    public $frontend_label;
    public $is_visible;
    public $is_required;
    public $default_value;
    public $is_searchable;
    public $is_filterable;
    public $is_comparable;
    public $is_visible_on_front;
    public $is_unique;
    public $used_in_product_listing;
    public $used_for_sort_by;
    public $note;
    public $is_visible_in_advanced_search;

    public function exchangeArray(array $data) {

        $this->attribute_id = !empty($data['attribute_id']) ? $data['attribute_id'] : null;
        $this->entity_id = !empty($data['entity_id']) ? $data['entity_id'] : null;
        $this->entity_type_id = !empty($data['entity_type_id']) ? $data['entity_type_id'] : null;
        $this->attribute_code = !empty($data['attribute_code']) ? $data['attribute_code'] : null;
        $this->backend_type = !empty($data['backend_type']) ? $data['backend_type'] : null;
        $this->backend_table = !empty($data['backend_table']) ? $data['backend_table'] : null;
        $this->frontend_input = !empty($data['frontend_input']) ? $data['frontend_input'] : null;
        $this->frontend_label = !empty($data['frontend_label']) ? $data['frontend_label'] : null;
        $this->is_visible = !empty($data['is_visible']) ? $data['is_visible'] : null;
        $this->is_required = !empty($data['is_required']) ? $data['is_required'] : null;
        $this->default_value = !empty($data['default_value']) ? $data['default_value'] : null;
        $this->is_searchable = !empty($data['is_searchable']) ? $data['is_searchable'] : null;
        $this->is_filterable = !empty($data['is_filterable']) ? $data['is_filterable'] : null;
        $this->is_comparable = !empty($data['is_comparable']) ? $data['is_comparable'] : null;
        $this->is_visible_on_front = !empty($data['is_visible_on_front']) ? $data['is_visible_on_front'] : null;
        $this->is_unique = !empty($data['is_unique']) ? $data['is_unique'] : null;
        $this->used_in_product_listing = !empty($data['used_in_product_listing']) ? $data['used_in_product_listing'] : null;
        $this->used_for_sort_by = !empty($data['used_for_sort_by']) ? $data['used_for_sort_by'] : null;
        $this->note = !empty($data['note']) ? $data['note'] : null;
        $this->is_visible_in_advanced_search = !empty($data['is_visible_in_advanced_search']) ? $data['is_visible_in_advanced_search'] : null;
    }
}