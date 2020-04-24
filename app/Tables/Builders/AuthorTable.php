<?php

namespace App\Tables\Builders;

use App\Author;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class AuthorTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../Templates/authors.json';

    public function query(): Builder
    {
        return Author::selectRaw('
            authors.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
