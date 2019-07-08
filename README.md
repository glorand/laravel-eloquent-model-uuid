# Laravel eloquent model uuid

A simple solution for providing UUID support for the IDs of your Eloquent models.

## Installation

You can install the package via composer:

```bash
composer require glorand/laravel-eloquent-model-uuid
```

## Usage
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