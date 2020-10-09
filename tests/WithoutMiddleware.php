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

        public function withoutMiddleware($middleware = null)
        {
            if (is_null($middleware)) {
                $this->app->instance('middleware.disable', true);
                return $this;
            }
            $nullMiddleware = new class {
                public function handle($request, $next)
                {
                    return $next($request);
                }
            };
            foreach ((array) $middleware as $abstract) {
                $this->app->instance($abstract, $nullMiddleware);
            }
            return $this;
        }

        public function disableMiddlewareForAllTests()
        {

            if (method_exists($this, 'withoutMiddleware')) {
                $this->withoutMiddleware(\LaravelEnso\Multitenancy\Http\Middleware\Multitenancy::class);
            } else {
                throw new Exception('Unable to disable middleware. MakesHttpRequests trait not used.');
            }
        }
    }
