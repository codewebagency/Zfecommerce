<?php

namespace Zfecommerce\Admin\Controller\Factory;

use Zend\Form\Exception\ExtensionNotLoadedException;
use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\Exception\ServiceNotCreatedException,
    Zfecommerce\Admin\Controller\UserController,
    Zfecommerce\Admin\Model\UserTable;

class UserControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        try {
            $service = $sm->get('AuthService');
            $model = $sm->get(UserTable::class);
            $storage = $sm->get('Zfecommerce\Admin\Model\MyAuthStorage');
        } catch(ServiceNotCreatedException $e) {
            $service = null;
            $model = null;
            $storage = null;
        } catch(ExtensionNotLoadedException $e) {
            $service = null;
            $model = null;
            $storage = null;
        }
        $controller = new UserController($model, $service, $storage);
        return $controller;
    }
}