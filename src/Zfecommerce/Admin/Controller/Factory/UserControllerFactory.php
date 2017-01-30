<?php

namespace Zfecommerce\Admin\Controller\Factory;

use Zend\Form\Exception\ExtensionNotLoadedException;
use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\Exception\ServiceNotCreatedException,
    Zfecommerce\Admin\Controller\UserController;

class UserControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        try {
            $service = $sm->get('AuthService');
        } catch(ServiceNotCreatedException $e) {
            $service = null;
        } catch(ExtensionNotLoadedException $e) {
            $service = null;
        }
        $controller = new UserController($service);
        return $controller;
    }
}