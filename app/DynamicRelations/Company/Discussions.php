<?php

namespace App\DynamicRelations\Company;

use Closure;
use LaravelLiberu\Discussions\Models\Discussion;
use LaravelLiberu\DynamicMethods\Contracts\Method;

class Discussions implements Method
{
    public function name(): string
    {
        return 'discussions';
    }

    public function closure(): Closure
    {
        return fn () => $this->morphMany(Discussion::class, 'discussable');
    }
}
