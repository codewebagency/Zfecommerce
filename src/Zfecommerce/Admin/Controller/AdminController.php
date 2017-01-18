<?php

namespace Zfecommerce\Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController
{
    private $table;

    public function __construct()
    {

    }

    public function indexAction()
    {
        die("Inside Admin Controller !");
    }
}