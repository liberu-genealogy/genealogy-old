<?php

namespace Tests;

use Exception;
use LaravelEnso\Multitenancy\Http\Middleware\Multitenancy;

trait WithoutMultitenancy
{
    /**
     * Prevent all middleware from being executed for this test class.
     *
     * @throws \Exception
     */
    public function disableMiddlewareForAllTests()
    {
        if (method_exists($this, 'withoutMiddleware')) {
            $this->withoutMiddleware([Multitenancy::class]);
        } else {
            throw new Exception('Unable to disable middleware. MakesHttpRequests trait not used.');
        }
    }
}
