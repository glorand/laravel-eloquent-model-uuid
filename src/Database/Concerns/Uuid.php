<?php

namespace Glorand\LaravelEloquentModelUuid\Database\Concerns;

use Illuminate\Support\Str;

trait Uuid
{
    abstract public function getKeyName();

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $model): void {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = $model->generateUuid();
            }
        });
    }

    protected function generateUuid(): string
    {
        return Str::uuid()->toString();
    }
}
