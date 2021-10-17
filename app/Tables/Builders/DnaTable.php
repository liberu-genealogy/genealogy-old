<?php

namespace App\Tables\Builders;

use App\Models\Dna;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class DnaTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/dna.json';

    public function query(): Builder
    {
        return Dna::selectRaw('
            dna.id, dna.name, dna.file_name, dna.variable_name, dna.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
