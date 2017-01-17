<?php

namespace Zfecommerce\Controller;

use Zfecommerce\Model\EavAttributeValueIntTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class EavAttributeValueIntController extends AbstractActionController
{
    private $table;

    public function __construct(EavAttributeValueIntTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {

    }
}