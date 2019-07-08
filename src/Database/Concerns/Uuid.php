<?php

namespace Glorand\LaravelEloquentModelUuid\Database\Concerns;

use Illuminate\Support\Str;

trait Uuid
{
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $model): void {
            $model->{$model->getKeyName()} = $model->generateUuid();
        });
    }

    protected function generateUuid(): string
    {
        return Str::uuid()->toString();
    }
}
