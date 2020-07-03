<?php

namespace App\Traits\enso\DynamicMethods;

trait Scopes
{
    use Methods;

    public function hasNamedScope($scope)
    {
        return isset(static::$dynamicMethods['scope'.ucfirst($scope)])
            || parent::hasNamedScope($scope);
    }
}
