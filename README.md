# Zfecommerce

Zfecommerce is an ecommerce module for Zend Framework 2, based on the EAV Data Modeling.

## Requirements

- PHP 5.6, PHP 7.0 or higher
- [Rbac component](https://github.com/ZF-Commons/zfc-rbac): this is actually a prototype for the ZF3 Rbac component.
- [Zend Framework 2.2 or higher](http://www.github.com/zendframework/zf2)

## Optional

- [DoctrineModule](https://github.com/doctrine/DoctrineModule): if you want to use Doctrine ORM.
- [ZendDeveloperTools](https://github.com/zendframework/ZendDeveloperTools): if you want to have useful stats added to
the Zend Developer toolbar.

## Upgrade

You can find an [upgrade guide](UPGRADE.md) to quickly upgrade your application from major versions of Zfecommerce .

## Installation

before installing the module itself install the requirements in zend framework root directory by issuing following commands :

composer require zf-commons/zfc-rbac:~2.4

Install the module:

```sh
Put the downloaded Zip package from here to the module directory of your zend installation .
```

Enable the module by adding `Zfecommerce` key to your `application.config.php` file.

## Documentation

The official documentation is available in the [/docs](/docs) folder.

You can also find some Doctrine entities in the [/data](/data) folder that will help you to more quickly take advantage
of Zfecommerce.

## Support

- File issues at https://github.com/codewebagency/Zfecommerce/issues.
