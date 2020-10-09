<?php

    namespace Tests;

    use Exception;

    trait WithoutMiddleware
    {

        /**
         * Prevent all middleware from being executed for this test class.
         *
         * @throws \Exception
         */
        public function disableMiddlewareForAllTests()
        {

            $middlewaresToDisable = [
                \LaravelEnso\Multitenancy\Http\Middleware\Multitenancy::class,
            ];

            if (method_exists($this, 'withoutMiddleware')) {
                $this->withoutMiddleware($middlewaresToDisable);
            } else {
                throw new Exception('Unable to disable middleware. MakesHttpRequests trait not used.');
            }
        }
    }
