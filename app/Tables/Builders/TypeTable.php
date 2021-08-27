<?php

namespace App\Tables\Builders;

use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class TypeTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/types.json';

    public function query(): Builder
    {
        return Type::selectRaw('
            types.id, types.name, types.description, types.is_active
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
