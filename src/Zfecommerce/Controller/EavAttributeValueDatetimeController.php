<?php

namespace Zfecommerce\Controller;

use Zfecommerce\Model\EavAttributeValueDatetimeTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class EavAttributeValueDatetimeController extends AbstractActionController
{
    private $table;

    public function __construct(EavAttributeValueDatetimeTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {

    }
}