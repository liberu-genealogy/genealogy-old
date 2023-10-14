<?php

namespace App\DynamicRelations\Company;

use Closure;
use LaravelLiberu\Comments\Models\Comment;
use LaravelLiberu\DynamicMethods\Contracts\Method;

class Comments implements Method
{
    public function name(): string
    {
        return 'comments';
    }

    public function closure(): Closure
    {
        return fn () => $this->morphMany(Comment::class, 'commentable');
    }
}
