<?php

namespace Zfecommerce\Controller;

use Zfecommerce\Model\EavAttributeTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class EavAttributeController extends AbstractActionController
{
    private $table;

    public function __construct(EavAttributeTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {

    }
}