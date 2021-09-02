<?php

namespace App\Tables\Builders;

use App\Models\SourceRefEven;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class SourceRefEvenTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/sourceRefEvens.json';

    public function query(): Builder
    {
        return SourceRefEven::selectRaw('
            sourceref_even.id, "sourceref_even.group", sourceref_even.gid, sourceref_even.even, sourceref_even.role, sourceref_even.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
