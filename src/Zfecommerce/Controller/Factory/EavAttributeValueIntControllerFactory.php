<?php

namespace Zfecommerce\Controller\Factory;

use Zend\Form\Exception\ExtensionNotLoadedException;
use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\Exception\ServiceNotCreatedException,
    Zfecommerce\Controller\EavAttributeValueIntController;

class EavAttributeValueIntControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        try {
            $model = $sm->get(\Zfecommerce\Model\EavAttributeValueIntTable::class);
        } catch(ServiceNotCreatedException $e) {
            $model = null;
        } catch(ExtensionNotLoadedException $e) {
            $model = null;
        }
        $controller = new EavAttributeValueIntController($model);
        return $controller;
    }
}