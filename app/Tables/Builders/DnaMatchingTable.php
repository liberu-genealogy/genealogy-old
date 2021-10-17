<?php

namespace App\Tables\Builders;

use App\Models\DnaMatching;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class DnaMatchingTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/dnamatching.json';

    public function query(): Builder
    {
        return DnaMatching::selectRaw('
            dna_matching.id, dna_matching.file1, dna_matching.file2, dna_matching.image, dna_matching.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
