<?php

namespace Zfecommerce\Model;

class ProductEntity
{
    public $entity_id;
    public $entity_type_id;
    public $product_key;
    public $category_ids;
    public $created_at;
    public $updated_at;

    public function exchangeArray(array $data) {

        $this->entity_id = !empty($data['entity_id']) ? $data['entity_id'] : null;
        $this->entity_type_id = !empty($data['entity_type_id']) ? $data['entity_type_id'] : null;
        $this->product_key = !empty($data['product_key']) ? $data['product_key'] : null;
        $this->category_ids = !empty($data['category_ids']) ? $data['category_ids'] : null;
        $this->created_at = !empty($data['created_at']) ? $data['created_at'] : null;
        $this->updated_at = !empty($data['updated_at']) ? $data['updated_at'] : null;
    }
}