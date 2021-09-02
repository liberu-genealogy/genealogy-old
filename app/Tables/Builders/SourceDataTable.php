<?php

namespace App\Tables\Builders;

use App\Models\SourceData;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class SourceDataTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/sourceDatas.json';

    public function query(): Builder
    {
        return SourceData::selectRaw('
            source_data.id, "source_data.group", source_data.gid, source_data.date, source_data.text, source_data.agnc, source_data.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
