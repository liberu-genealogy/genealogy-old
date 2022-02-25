<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware(\App\Http\Middleware\Multitenant::class);
    }

    protected function needsMySqlConnection(): void
    {
        if (env('DB_CONNECTION') === 'sqlite') {
            $this->markTestSkipped('ENV must use mysql to perform these tests.');
        }
    }
}
