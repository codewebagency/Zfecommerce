<?php

namespace Zfecommerce\Controller\Factory;

use Zend\Form\Exception\ExtensionNotLoadedException;
use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\Exception\ServiceNotCreatedException,
    Zfecommerce\Controller\ProductEntityController;

class ProductEntityControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        try {
            $model = $sm->get(\Zfecommerce\Model\ProductEntityTable::class);
        } catch(ServiceNotCreatedException $e) {
            $model = null;
        } catch(ExtensionNotLoadedException $e) {
            $model = null;
        }
        $controller = new ProductEntityController($model);
        return $controller;
    }
}