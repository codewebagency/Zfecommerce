<?php

namespace Zfecommerce\Controller;

use Zfecommerce\Model\EavAttributeValueTextTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class EavAttributeValueTextController extends AbstractActionController
{
    private $table;

    public function __construct(EavAttributeValueTextTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {

    }
}