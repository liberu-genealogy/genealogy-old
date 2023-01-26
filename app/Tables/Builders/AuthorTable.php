<?php

namespace App\Tables\Builders;

use App\Models\Author;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class AuthorTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/authors.json';

    public function query(): Builder
    {
        $authors = Author::selectRaw('
            authors.id, authors.name, authors.description, authors.is_active
        ');
        return $authors;
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
