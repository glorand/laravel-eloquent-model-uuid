# Laravel eloquent model uuid
[![Latest Stable Version](https://poser.pugx.org/glorand/laravel-eloquent-model-uuid/v/stable)](https://packagist.org/packages/glorand/laravel-model-settings)
[![Build Status](https://travis-ci.com/glorand/laravel-eloquent-model-uuid.svg?branch=master)](https://travis-ci.com/glorand/laravel-eloquent-model-uuid)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE.md)
[![Build Status](https://scrutinizer-ci.com/g/glorand/laravel-eloquent-model-uuid/badges/build.png?b=master)](https://scrutinizer-ci.com/g/glorand/laravel-eloquent-model-uuid/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/glorand/laravel-eloquent-model-uuid/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/glorand/laravel-eloquent-model-uuid/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/glorand/laravel-eloquent-model-uuid/?branch=master)
A simple solution for providing UUID support for the IDs of your Eloquent models.

## Installation

You can install the package via composer:

```bash
composer require glorand/laravel-eloquent-model-uuid
```

## Usage
Let us start on the database side of things.
```php
$table->uuid('id');
$table->primary('id');
//OR
$table->uuid('id')->primary();
```

Instead of extending the standard Laravel model class, 
extend from the model class provided by this package:
```php
<?php
use Glorand\LaravelEloquentModelUuid\Database\Eloquent\Model;

class Entity extends Model
{
    //
}
```

Use Trait on model class:
```php
<?php
use Illuminate\Database\Eloquent\Model;
use Glorand\LaravelEloquentModelUuid\Database\Concerns\Uuid;

class Entity extends Model
{
    use Uuid;
    
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    //
}
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email gombos.lorand@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.