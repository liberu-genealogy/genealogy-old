<?php

namespace App\Tables\Builders;

use App\Models\Citation;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class CitationTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/citations.json';

    public function query(): Builder
    {
        return Citation::select(\DB::raw('
            citations.id as "dtRowId", citations.name as name, citations.description as description, citations.volume as volume,
 citations.page as page, citations.confidence as confidence, citations.is_active as is_active,
 citations.date as date, citations.created_at as created_at, sources.name as source
        '))->join('sources', 'citations.source_id', '=', 'sources.id');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
