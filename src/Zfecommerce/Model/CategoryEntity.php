<?php

namespace Zfecommerce\Model;

class CategoryEntity
{
    public $entity_id;
    public $entity_type_id;
    public $parent_id;
    public $created_at;
    public $updated_at;
    public $path;
    public $level;
    public $children_count;

    public function exchangeArray(array $data) {

        $this->entity_id = !empty($data['entity_id']) ? $data['entity_id'] : null;
        $this->entity_type_id = !empty($data['entity_type_id']) ? $data['entity_type_id'] : null;
        $this->parent_id = !empty($data['parent_id']) ? $data['parent_id'] : null;
        $this->created_at = !empty($data['created_at']) ? $data['created_at'] : null;
        $this->updated_at = !empty($data['updated_at']) ? $data['updated_at'] : null;
        $this->path = !empty($data['path']) ? $data['path'] : null;
        $this->level = !empty($data['level']) ? $data['level'] : null;
        $this->children_count = !empty($data['children_count']) ? $data['children_count'] : null;
    }
}