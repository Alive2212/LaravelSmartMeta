# LaravelSmartMeta

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This is Smart Meta for any model to assign expirable date to each of records.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practices by being named the following.

```
src/
tests/
```


## Install

Via Composer

``` bash
$ composer require alive2212/laravel-smart-meta

```

## Usage

1- add trait to model
```php
class User extends BaseAuthModel
{
    use SmartMeta;
}
```

2- to set meta to any model, should be done just following
```php
$user = (new User())->find(1);
$user->putCacheMeta("1","I'm Strong man");
```
3- Another methods to set metas are:
```php
// 1
$user->addCacheMeta("1","I'm String man");

// 2
$user->pushCacheMeta(["1","I'm String man"]);

```
4- Get metas methods are:
```php
// 1 get all metas
$metaParams = $user->getCacheMetas();

// 2 get one of meta by key
$metaParams = $user->getCacheMeta("key","default");
```
5- Delete
```php
// To delete all data
$user->deleteCacheMetas();

// TO delete one record
$user->deleteCacheMeta("key");
```
## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email alive2212@yahoo.com instead of using the issue tracker.

## Credits

- [Babak Nodoust][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/Alive2212/laravel-smart-meta.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Alive2212/LaravelSmartMeta/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Alive2212/LaravelSmartMeta.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Alive2212/LaravelSmartMeta.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/Alive2212/laravel-smart-meta.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/Alive2212/laravel-smart-meta
[link-travis]: https://travis-ci.org/Alive2212/LaravelSmartMeta
[link-scrutinizer]: https://scrutinizer-ci.com/g/Alive2212/LaravelSmartMeta/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Alive2212/LaravelSmartMeta
[link-downloads]: https://packagist.org/packages/Alive2212/laravel-smart-meta
[link-author]: https://github.com/https://github.com/Alive2212
[link-contributors]: ../../contributors
