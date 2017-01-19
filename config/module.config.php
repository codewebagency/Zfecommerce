<?php

namespace Zfecommerce;

return array(
    'router' => array(
        'routes' => array(
            'install' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/install[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Zfecommerce\Controller',
                        'controller'    => 'Install',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'store' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/store[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Zfecommerce\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'category-entity' => [
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/category-entity[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Zfecommerce\Controller',
                        'controller'    => 'CategoryEntity',
                        'action'        => 'index',
                    ),
                ),
            ],
            'eav-entity-type' => [
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/eav-entity-type[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Zfecommerce\Controller',
                        'controller'    => 'EavEntityType',
                        'action'        => 'index',
                    ),
                ),
            ],
            'product-entity' => [
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/product-entity[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Zfecommerce\Controller',
                        'controller'    => 'ProductEntity',
                        'action'        => 'index',
                    ),
                ),
            ],
            'customer-entity' => [
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/customer-entity[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Zfecommerce\Controller',
                        'controller'    => 'CustomerEntity',
                        'action'        => 'index',
                    ),
                ),
            ],
            'eav-attribute' => [
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/eav-attribute[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Zfecommerce\Controller',
                        'controller'    => 'EavAttribute',
                        'action'        => 'index',
                    ),
                ),
            ],
            'eav-attribute-value-datetime' => [
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/eav-attribute-value-datetime[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Zfecommerce\Controller',
                        'controller'    => 'EavAttributeValueDatetime',
                        'action'        => 'index',
                    ),
                ),
            ],
            'eav-attribute-value-float' => [
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/eav-attribute-value-float[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Zfecommerce\Controller',
                        'controller'    => 'EavAttributeValueFloat',
                        'action'        => 'index',
                    ),
                ),
            ],
            'eav-attribute-value-int' => [
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/eav-attribute-value-int[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Zfecommerce\Controller',
                        'controller'    => 'EavAttributeValueInt',
                        'action'        => 'index',
                    ),
                ),
            ],
            'eav-attribute-value-text' => [
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/eav-attribute-value-text[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Zfecommerce\Controller',
                        'controller'    => 'EavAttributeValueText',
                        'action'        => 'index',
                    ),
                ),
            ],
            'eav-attribute-value-varchar' => [
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/eav-attribute-value-varchar[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Zfecommerce\Controller',
                        'controller'    => 'EavAttributeValueVarchar',
                        'action'        => 'index',
                    ),
                ),
            ],
            'admin' => [
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Zfecommerce\Admin\Controller',
                        'controller'    => 'Admin',
                        'action'        => 'index',
                    ),
                ),
            ],
            'login' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/auth',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Zfecommerce\Admin\Controller',
                        'controller'    => 'Auth',
                        'action'        => 'login',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'process' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
            'Zend\Db\Adapter\AdapterInterface' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
        'invokables' => array(
            'Home\Service\ProductServiceInterface' => 'Home\Service\ProductService',
        )
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => [
        'invokables' => [
            'Zfecommerce\Controller\Index' => 'Zfecommerce\Controller\IndexController',
            'Zfecommerce\Controller\Install' => 'Zfecommerce\Controller\InstallController',
            'Zfecommerce\Admin\Controller\Admin' => 'Zfecommerce\Admin\Controller\AdminController',
            'Zfecommerce\Admin\Controller\Auth' => 'Zfecommerce\Admin\Controller\AuthController',
        ],
        'factories' => [
            'Zfecommerce\Controller\CategoryEntity' => 'Zfecommerce\Controller\Factory\CategoryEntityControllerFactory',
            'Zfecommerce\Controller\EavEntityType' => 'Zfecommerce\Controller\Factory\EavEntityTypeControllerFactory',
            'Zfecommerce\Controller\ProductEntity' => 'Zfecommerce\Controller\Factory\ProductEntityControllerFactory',
            'Zfecommerce\Controller\CustomerEntity' => 'Zfecommerce\Controller\Factory\CustomerEntityControllerFactory',
            'Zfecommerce\Controller\EavAttribute' => 'Zfecommerce\Controller\Factory\EavAttributeControllerFactory',
            'Zfecommerce\Controller\EavAttributeValueDatetime' => 'Zfecommerce\Controller\Factory\EavAttributeValueDatetimeControllerFactory',
            'Zfecommerce\Controller\EavAttributeValueFloat' => 'Zfecommerce\Controller\Factory\EavAttributeValueFloatControllerFactory',
            'Zfecommerce\Controller\EavAttributeValueInt' => 'Zfecommerce\Controller\Factory\EavAttributeValueIntControllerFactory',
            'Zfecommerce\Controller\EavAttributeValueText' => 'Zfecommerce\Controller\Factory\EavAttributeValueTextControllerFactory',
            'Zfecommerce\Controller\EavAttributeValueVarchar' => 'Zfecommerce\Controller\Factory\EavAttributeValueVarcharControllerFactory',
        ]
    ],
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../../Application/view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
