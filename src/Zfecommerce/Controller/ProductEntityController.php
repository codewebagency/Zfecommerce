<?php

namespace Zfecommerce\Controller;

use Zfecommerce\Model\ProductEntityTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductEntityController extends AbstractActionController
{
    private $table;

    public function __construct(ProductEntityTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {

    }
}