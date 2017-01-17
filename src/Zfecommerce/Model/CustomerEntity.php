<?php

namespace Zfecommerce\Model;

class CustomerEntity
{
    public $entity_id;
    public $entity_type_id;
    public $email;
    public $created_at;
    public $updated_at;
    public $is_active;

    public function exchangeArray(array $data) {

        $this->entity_id = !empty($data['entity_id']) ? $data['entity_id'] : null;
        $this->entity_type_id = !empty($data['entity_type_id']) ? $data['entity_type_id'] : null;
        $this->email = !empty($data['email']) ? $data['email'] : null;
        $this->created_at = !empty($data['created_at']) ? $data['created_at'] : null;
        $this->updated_at = !empty($data['updated_at']) ? $data['updated_at'] : null;
        $this->is_active = !empty($data['is_active']) ? $data['is_active'] : null;
    }
}