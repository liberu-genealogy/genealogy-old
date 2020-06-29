<?php

namespace App\Tables\Builders;

use App\SourceRefEven;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class SourceRefEvenTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/sourceRefEvens.json';

    public function query(): Builder
    {
        return SourceRefEven::selectRaw('
            source_ref_even.id, source_ref_even.group, source_ref_even.gid, source_ref_even.even, source_ref_even.role, source_ref_even.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
