<?php

namespace App\Tables\Builders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class CategoryTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/categories.json';

    public function query(): Builder
    {
        return Category::selectRaw('
            categories.id, categories.name, categories.description, categories.slug, categories.order
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
