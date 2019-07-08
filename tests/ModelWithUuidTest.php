<?php

namespace Glorand\LaravelEloquentModelUuid\Tests;

use Glorand\LaravelEloquentModelUuid\Tests\Models\UserWithUuid;
use Illuminate\Support\Str;

class ModelWithUuidTest extends TestCase
{
    /** @test */
    public function testModelWithUuid()
    {
        /** @var UserWithUuid $testModel */
        $testModel = UserWithUuid::query()->first();
        $this->assertEquals(36, mb_strlen($testModel->id));

        $uuid = Str::uuid()->toString();
        /** @var UserWithUuid $testModel */
        $testModel = UserWithUuid::query()->create([
            'id' => $uuid,
        ]);
        $this->assertEquals($uuid, $testModel->id);
    }
}
