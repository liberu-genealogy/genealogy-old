<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
// use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\WithoutMultitenancy;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use WithoutMultitenancy;

}
