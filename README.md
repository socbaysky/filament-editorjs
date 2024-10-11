# This is my package filament-editorjs

[![Latest Version on Packagist](https://img.shields.io/packagist/v/athphane/filament-editorjs.svg?style=flat-square)](https://packagist.org/packages/athphane/filament-editorjs)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/athphane/filament-editorjs/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/athphane/filament-editorjs/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/athphane/filament-editorjs/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/athphane/filament-editorjs/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/athphane/filament-editorjs.svg?style=flat-square)](https://packagist.org/packages/athphane/filament-editorjs)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require athphane/filament-editorjs
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-editorjs-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-editorjs-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-editorjs-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentEditorjs = new Athphane\FilamentEditorjs();
echo $filamentEditorjs->echoPhrase('Hello, Athphane!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [athphane](https://github.com/athphane)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
