<?php

namespace Zfecommerce\Model;

class EavAttributeValueInt
{
    public $value_id;
    public $entity_id;
    public $entity_type_id;
    public $attribute_id;
    public $value;

    public function exchangeArray(array $data) {

        $this->value_id = !empty($data['value_id']) ? $data['value_id'] : null;
        $this->entity_id = !empty($data['entity_id']) ? $data['entity_id'] : null;
        $this->entity_type_id = !empty($data['entity_type_id']) ? $data['entity_type_id'] : null;
        $this->attribute_id = !empty($data['attribute_id']) ? $data['attribute_id'] : null;
        $this->value = !empty($data['value']) ? $data['value'] : null;
    }
}