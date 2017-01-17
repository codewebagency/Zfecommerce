<?php


namespace Zfecommerce\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class InstallController extends AbstractActionController
{

    private $migrationVersion = '1';

    public function indexAction()
    {
        $migrationClass = '\Zfecommerce\Migration\MigrationV' . $this->migrationVersion;
        $migration = new $migrationClass;
        $migration->up();
    }
}
























