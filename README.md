# Laravel Currency Casting
[![Latest version on Packagist](https://img.shields.io/packagist/v/snoeren-development/laravel-currency-casting.svg?style=flat-square)](https://packagist.org/packages/snoeren-development/laravel-currency-casting)
[![Software License](https://img.shields.io/github/license/snoeren-development/laravel-currency-casting?style=flat-square)](LICENSE)
[![Build status](https://img.shields.io/github/workflow/status/snoeren-development/laravel-currency-casting/PHP%20Tests?style=flat-square)](https://github.com/snoeren-development/laravel-currency-casting/actions)
[![Downloads](https://img.shields.io/packagist/dt/snoeren-development/laravel-currency-casting?style=flat-square)](https://packagist.org/packages/snoeren-development/laravel-currency-casting)
[![Donate](https://img.shields.io/beerpay/snoeren-development/laravel-currency-casting?style=flat-square)](https://beerpay.io/snoeren-development/laravel-currency-casting)

This package adds a Laravel model cast. This way you can cast any attribute, with an integer value, to a currency!

## Installation
You can install the package using Composer:
```bash
composer require snoeren-development/laravel-currency-casting
```

### Requirements
This package requires PHP 7.2 or higher.

### Usage
Add the attributes you'd like to see cast to the `casts` array and assign the `Currency` class to it.
```php
use Illuminate\Database\Eloquent\Model;
use SnoerenDevelopment\CurrencyCasting\Currency;

class Plan extends Model
{
    //

    /**
     * The attributes that are should be cast.
     *
     * @var array
     */
    protected $casts = [
        'price' => Currency::class,
    ];

    //
}
```

## Testing
```bash
$ composer test
```

## Credits
- [Michael Snoeren](https://github.com/MSnoeren)
- [All Contributors](https://github.com/snoeren-development/laravel-currency-casting-channel/graphs/contributors)

## License
The MIT license. See [LICENSE](LICENSE) for more information.
