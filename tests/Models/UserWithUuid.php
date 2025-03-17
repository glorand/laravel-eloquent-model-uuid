<?php

namespace Glorand\LaravelEloquentModelUuid\Tests\Models;

use Glorand\LaravelEloquentModelUuid\Database\Eloquent\Model;

/**
 * Class UserWithUuid
 *
 * @property string $id
 * @property string $name
 */
class UserWithUuid extends Model
{
    protected $table = 'users_with_uuid';

    protected $guarded = [];

    protected $fillable = ['id', 'name'];
}
