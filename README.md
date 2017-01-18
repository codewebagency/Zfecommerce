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

Zfecommerce only officially supports installation through Composer. For Composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

Install the module:

```sh
$ php composer.phar require codewebagency/Zfecommerce:~0.1
```

Enable the module by adding `Zfecommerce` key to your `application.config.php` file.

## Documentation

The official documentation is available in the [/docs](/docs) folder.

You can also find some Doctrine entities in the [/data](/data) folder that will help you to more quickly take advantage
of Zfecommerce.

## Support

- File issues at https://github.com/codewebagency/Zfecommerce/issues.