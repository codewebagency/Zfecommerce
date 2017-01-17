<?php

namespace Zfecommerce\Model;

class EavEntityType
{
    public $entity_type_code;
    public $entity_type_id;
    public $entity_label;

    public function exchangeArray(array $data) {

        $this->entity_type_code = !empty($data['entity_type_code']) ? $data['entity_type_code'] : null;
        $this->entity_type_id = !empty($data['entity_type_id']) ? $data['entity_type_id'] : null;
        $this->entity_label = !empty($data['entity_label']) ? $data['entity_label'] : null;
    }
}