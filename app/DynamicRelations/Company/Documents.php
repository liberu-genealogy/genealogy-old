<?php

namespace App\DynamicRelations\Company;

use Closure;
use LaravelLiberu\Documents\Models\Document;
use LaravelLiberu\DynamicMethods\Contracts\Method;

class Documents implements Method
{
    public function name(): string
    {
        return 'documents';
    }

    public function closure(): Closure
    {
        return fn () => $this->morphMany(Document::class, 'documentable');
    }
}
