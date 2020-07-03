<?php

namespace App\Traits\enso\DynamicMethods;

use Illuminate\Support\Str;

trait Mutators
{
    use Methods;

    public function hasGetMutator($key)
    {
        return isset(static::$dynamicMethods['get'.Str::studly($key).'Attribute'])
            || parent::hasGetMutator($key);
    }

    public function hasSetMutator($key)
    {
        return isset(static::$dynamicMethods['set'.Str::studly($key).'Attribute'])
            || parent::hasSetMutator($key);
    }
}
