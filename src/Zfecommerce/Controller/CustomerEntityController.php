<?php

namespace Zfecommerce\Controller;

use Zfecommerce\Model\CustomerEntityTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CustomerEntityController extends AbstractActionController
{
    private $table;

    public function __construct(CustomerEntityTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {

    }
}