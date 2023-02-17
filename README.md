# Laravel Currency Casting
[![Latest version on Packagist](https://img.shields.io/packagist/v/snoeren-development/laravel-currency-casting.svg?style=flat-square)](https://packagist.org/packages/snoeren-development/laravel-currency-casting)
[![Software License](https://img.shields.io/github/license/snoeren-development/laravel-currency-casting?style=flat-square)](LICENSE)
[![Build status](https://img.shields.io/github/actions/workflow/status/snoeren-development/laravel-currency-casting/php.yml?style=flat-square)](https://github.com/snoeren-development/laravel-currency-casting/actions)
[![Downloads](https://img.shields.io/packagist/dt/snoeren-development/laravel-currency-casting?style=flat-square)](https://packagist.org/packages/snoeren-development/laravel-currency-casting)

This package adds a Laravel model cast. This way you can cast any attribute that stores a currency, with an integer value in the database, to a float automatically!

## Installation
You can install the package using Composer:
```bash
composer require snoeren-development/laravel-currency-casting
```

### Requirements
This package requires **at least** PHP 8.0 and Laravel 8.

### Usage
Store your currency as an integer value in the database. This is more accurate than storing it as a float.
Add the attributes you'd like to see cast to the `casts` array and assign the `Currency` class to it. If you need more than the default 2 digits currency usually has, you can append the number of digits you need after the currency class like in the example below. Just make sure your database column can handle the larger integer it produces.
```php
<?php
use Illuminate\Database\Eloquent\Model;
use SnoerenDevelopment\CurrencyCasting\Currency;

class Plan extends Model
{
    //

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'price' => Currency::class,
        'price_with_digits' => Currency::class . ':4',
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
- [All Contributors](https://github.com/snoeren-development/laravel-currency-casting/graphs/contributors)

## License
The MIT license. See [LICENSE](LICENSE) for more information.
