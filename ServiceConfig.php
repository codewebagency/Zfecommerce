<?php

namespace Zfecommerce;

use Zend\EventManager\EventInterface as Event;
use Zend\Mvc\Application;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Authentication\Storage;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter as DbTableAuthAdapter;

return [
    'factories' => [
        Model\CategoryEntityTable::class => function($container) {
            $tableGateway = $container->get(Model\CategoryEntityTableGateway::class);
            return new Model\CategoryEntityTable($tableGateway);
        },
        Model\CategoryEntityTableGateway::class => function($container) {
            $dbAdapter = $container->get(AdapterInterface::class);
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Model\CategoryEntity());
            return new TableGateway('category_entity', $dbAdapter, null, $resultSetPrototype);
        },
        Model\EavEntityTypeTable::class => function($container) {
            $tableGateway = $container->get(Model\EavEntityTypeTableGateway::class);
            return new Model\EavEntityTypeTable($tableGateway);
        },
        Model\EavEntityTypeTableGateway::class => function($container) {
            $dbAdapter = $container->get(AdapterInterface::class);
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Model\EavEntityType());
            return new TableGateway('eav_entity_type', $dbAdapter, null, $resultSetPrototype);
        },
        Model\ProductEntityTable::class => function($container) {
            $tableGateway = $container->get(Model\ProductEntityTableGateway::class);
            return new Model\ProductEntityTable($tableGateway);
        },
        Model\ProductEntityTableGateway::class => function($container) {
            $dbAdapter = $container->get(AdapterInterface::class);
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Model\ProductEntity());
            return new TableGateway('product_entity', $dbAdapter, null, $resultSetPrototype);
        },
        Model\CustomerEntityTable::class => function($container) {
            $tableGateway = $container->get(Model\CustomerEntityTableGateway::class);
            return new Model\CustomerEntityTable($tableGateway);
        },
        Model\CustomerEntityTableGateway::class => function($container) {
            $dbAdapter = $container->get(AdapterInterface::class);
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Model\CustomerEntity());
            return new TableGateway('customer_entity', $dbAdapter, null, $resultSetPrototype);
        },
        Model\EavAttributeTable::class => function($container) {
            $tableGateway = $container->get(Model\EavAttributeTableGateway::class);
            return new Model\EavAttributeTable($tableGateway);
        },
        Model\EavAttributeTableGateway::class => function($container) {
            $dbAdapter = $container->get(AdapterInterface::class);
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Model\EavAttribute());
            return new TableGateway('eav_attribute', $dbAdapter, null, $resultSetPrototype);
        },
        Model\EavAttributeValueDatetimeTable::class => function($container) {
            $tableGateway = $container->get(Model\EavAttributeValueDatetimeTableGateway::class);
            return new Model\EavAttributeValueDatetimeTable($tableGateway);
        },
        Model\EavAttributeValueDatetimeTableGateway::class => function($container) {
            $dbAdapter = $container->get(AdapterInterface::class);
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Model\EavAttributeValueDatetime());
            return new TableGateway('eav_attribute_value_datetime', $dbAdapter, null, $resultSetPrototype);
        },
        Model\EavAttributeValueFloatTable::class => function($container) {
            $tableGateway = $container->get(Model\EavAttributeValueFloatTableGateway::class);
            return new Model\EavAttributeValueFloatTable($tableGateway);
        },
        Model\EavAttributeValueFloatTableGateway::class => function($container) {
            $dbAdapter = $container->get(AdapterInterface::class);
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Model\EavAttributeValueFloat());
            return new TableGateway('eav_attribute_value_float', $dbAdapter, null, $resultSetPrototype);
        },
        Model\EavAttributeValueIntTable::class => function($container) {
            $tableGateway = $container->get(Model\EavAttributeValueIntTableGateway::class);
            return new Model\EavAttributeValueIntTable($tableGateway);
        },
        Model\EavAttributeValueIntTableGateway::class => function($container) {
            $dbAdapter = $container->get(AdapterInterface::class);
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Model\EavAttributeValueInt());
            return new TableGateway('eav_attribute_value_int', $dbAdapter, null, $resultSetPrototype);
        },
        Model\EavAttributeValueTextTable::class => function($container) {
            $tableGateway = $container->get(Model\EavAttributeValueTextTableGateway::class);
            return new Model\EavAttributeValueTextTable($tableGateway);
        },
        Model\EavAttributeValueTextTableGateway::class => function($container) {
            $dbAdapter = $container->get(AdapterInterface::class);
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Model\EavAttributeValueText());
            return new TableGateway('eav_attribute_value_text', $dbAdapter, null, $resultSetPrototype);
        },
        Model\EavAttributeValueVarcharTable::class => function($container) {
            $tableGateway = $container->get(Model\EavAttributeValueVarcharTableGateway::class);
            return new Model\EavAttributeValueVarcharTable($tableGateway);
        },
        Model\EavAttributeValueVarcharTableGateway::class => function($container) {
            $dbAdapter = $container->get(AdapterInterface::class);
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Model\EavAttributeValueVarchar());
            return new TableGateway('eav_attribute_value_varchar', $dbAdapter, null, $resultSetPrototype);
        },
        Admin\Model\MyAuthStorage::class => function($container){
            return new Admin\Model\MyAuthStorage('zfeC_auth');
        },
        'AuthService' => function($container) {
            //My assumption, you've alredy set dbAdapter
            //and has user table with columns : email and password
            //that password hashed with md5
            $dbAdapter           = $container->get(AdapterInterface::class);
            $dbTableAuthAdapter  = new DbTableAuthAdapter($dbAdapter,
                'user','email','password', 'MD5(?)');

            $authService = new AuthenticationService();
            $authService->setAdapter($dbTableAuthAdapter);
            $authService->setStorage($container->get(Admin\Model\MyAuthStorage::class));
            return $authService;
        },
        Admin\Model\UserTable::class => function($container) {
            $tableGateway = $container->get(Admin\Model\UserTableGateway::class);
            return new Admin\Model\UserTable($tableGateway);
        },
        Admin\Model\UserTableGateway::class => function($container) {
            $dbAdapter = $container->get(AdapterInterface::class);
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Admin\Model\User());
            return new TableGateway('user', $dbAdapter, null, $resultSetPrototype);
        },
    ]
];