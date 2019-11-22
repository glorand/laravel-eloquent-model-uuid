<?php

namespace Glorand\LaravelEloquentModelUuid\Tests;

use Glorand\LaravelEloquentModelUuid\Tests\Models\UserWithUuid;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Illuminate\Support\Arr;

class TestCase extends OrchestraTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase();
        $this->checkRequirements();
    }

    protected function checkRequirements()
    {
        collect($this->getAnnotations())->filter(function ($location) {
            return in_array('!Travis', Arr::get($location, 'requires', []));
        })->each(function ($location) {
            $this->markTestSkipped('Travis will not run this test.');
        });
    }

    protected function setUpDatabase()
    {
        $this->createTables('users_with_uuid');
        $this->seedModels(UserWithUuid::class);
    }

    protected function createTables(...$tableNames)
    {
        collect($tableNames)->each(function (string $tableName) {
            Schema::create($tableName, function (Blueprint $table) use ($tableName) {
                if ('users_with_uuid' === $tableName) {
                    $table->uuid('id')->primary();
                } else {
                    $table->primary('id');
                }
                $table->string('name')->nullable();
                $table->timestamps();
            });
        });
    }

    protected function seedModels(...$modelClasses)
    {
        collect($modelClasses)->each(function (string $modelClass) {
            foreach (range(1, 2) as $index) {
                $modelClass::create(['name' => "name {$index}"]);
            }
        });
    }

    public function markTestAsPassed()
    {
        $this->assertTrue(true);
    }
}
