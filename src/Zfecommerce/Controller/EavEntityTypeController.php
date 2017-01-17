<?php

namespace Zfecommerce\Controller;

use Zfecommerce\Model\EavEntityTypeTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class EavEntityTypeController extends AbstractActionController
{
    private $table;

    public function __construct(EavEntityTypeTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        die("Inside Eav Entity Type !");
    }
}