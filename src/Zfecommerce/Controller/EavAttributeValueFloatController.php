<?php

namespace Zfecommerce\Controller;

use Zfecommerce\Model\EavAttributeValueFloatTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class EavAttributeValueFloatController extends AbstractActionController
{
    private $table;

    public function __construct(EavAttributeValueFloatTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {

    }
}