<?php

namespace Zfecommerce\Controller;

use Zfecommerce\Model\EavAttributeValueVarcharTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class EavAttributeValueVarcharController extends AbstractActionController
{
    private $table;

    public function __construct(EavAttributeValueVarcharTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {

    }
}