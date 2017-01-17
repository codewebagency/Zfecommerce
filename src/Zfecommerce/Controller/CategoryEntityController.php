<?php

namespace Zfecommerce\Controller;

use Zfecommerce\Model\CategoryEntityTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CategoryEntityController extends AbstractActionController
{
    private $table;

    public function __construct(CategoryEntityTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {

    }
}