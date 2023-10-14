<?php

namespace App\Tables\Builders;

use App\Models\Author;
use Illuminate\Database\Eloquent\Builder;
use LaravelLiberu\Tables\Contracts\Table;

class AuthorTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/authors.json';

    public function query(): Builder
    {
        return Author::selectRaw('
            authors.id, authors.name, authors.description, authors.is_active
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
