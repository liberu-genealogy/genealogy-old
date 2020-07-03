<?php

namespace App\Traits\enso\DynamicMethods;

use BadMethodCallException;
use Closure;

trait StaticMethods
{
    protected static $dynamicStaticMethods = [];

    public static function __callStatic($method, $args)
    {
        if (isset(static::$dynamicStaticMethods[$method])) {
            $closure = Closure::bind(
                static::$dynamicStaticMethods[$method], null, static::class
            );

            return $closure(...$args);
        }

        if (method_exists(parent::class, '__callStatic')) {
            return parent::__callStatic($method, $args);
        }

        throw new BadMethodCallException(
            'Method '.static::class.'::'.$method.'() not found'
        );
    }

    public static function addDynamicStaticMethod($name, Closure $method)
    {
        static::$dynamicStaticMethods[$name] = $method;
    }
}
