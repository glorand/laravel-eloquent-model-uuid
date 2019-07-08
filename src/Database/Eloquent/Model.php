<?php

namespace Glorand\LaravelEloquentModelUuid\Database\Eloquent;

use Glorand\LaravelEloquentModelUuid\Database\Concerns\Uuid;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
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

    /**
     * Indicates if the IDs are UUIDs.
     *
     * @var bool
     */
    protected $keyIsUuid = true;
}
