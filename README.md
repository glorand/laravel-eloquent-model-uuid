# Laravel Eloquent Model UUID

[![Latest Stable Version](https://poser.pugx.org/glorand/laravel-eloquent-model-uuid/v/stable)](https://packagist.org/packages/glorand/laravel-model-settings)
[![Build Status](https://travis-ci.com/glorand/laravel-eloquent-model-uuid.svg?branch=master)](https://travis-ci.com/glorand/laravel-eloquent-model-uuid)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE.md)

A simple and elegant solution for using UUIDs as primary keys in your Laravel Eloquent models.

## Why Use UUIDs?

UUIDs (Universally Unique Identifiers) offer several advantages over traditional auto-incrementing integer IDs:

- **Security**: UUIDs don't expose information about the number of records in your database
- **Distribution**: Safe to generate across multiple databases without collision risk
- **Portability**: Easy to merge data from different sources
- **API-friendly**: Non-sequential IDs prevent enumeration attacks

## Requirements

- PHP >= 7.1.3
- Laravel/Illuminate 5.8, 6.x, 7.x, 8.x, or 9.x

## Installation

Install the package via Composer:

```bash
composer require glorand/laravel-eloquent-model-uuid
```

## Usage

### Step 1: Database Migration

First, update your migration to use UUID for the primary key:

```php
Schema::create('entities', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->string('name');
    $table->timestamps();
});
```

### Step 2: Configure Your Model

You have two options to add UUID support to your models:

#### Option A: Extend the UUID Model Class (Recommended)

The simplest approach - extend the base model provided by this package:

```php
<?php

namespace App\Models;

use Glorand\LaravelEloquentModelUuid\Database\Eloquent\Model;

class Entity extends Model
{
    protected $fillable = ['name'];
}
```

This approach automatically configures:
- `$keyType = 'string'`
- `$incrementing = false`
- UUID generation on model creation

#### Option B: Use the UUID Trait

If you need to extend a different base class, use the trait instead:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Glorand\LaravelEloquentModelUuid\Database\Concerns\Uuid;

class Entity extends Model
{
    use Uuid;
    
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['name'];
}
```

### Step 3: Use Your Model

That's it! Your models will now automatically generate UUIDs when created:

```php
// Create a new model - UUID is generated automatically
$entity = Entity::create(['name' => 'My Entity']);
echo $entity->id; // "550e8400-e29b-41d4-a716-446655440000"

// Find by UUID
$found = Entity::find('550e8400-e29b-41d4-a716-446655440000');

// Standard Eloquent methods work as expected
$all = Entity::all();
$paginated = Entity::paginate(10);
```

## Advanced Usage

### Manual UUID Generation

If you need to manually generate a UUID:

```php
$entity = new Entity();
$uuid = $entity->generateUuid();
```

### Custom UUID Logic

You can override the `generateUuid()` method to implement custom UUID generation logic:

```php
class Entity extends Model
{
    public function generateUuid(): string
    {
        // Your custom UUID generation logic
        return Str::uuid()->toString();
    }
}
```

## Testing

Run the test suite:

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for information about recent changes.

## Contributing

Contributions are welcome! Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email gombos.lorand@gmail.com instead of using the issue tracker.

## Credits

- [Gombos Lorand](https://github.com/glorand)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
