<?php

namespace App\Tables\Builders;

use App\SourceData;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class SourceDataTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../Templates/sourceDatas.json';

    public function query(): Builder
    {
        return SourceData::selectRaw('
            source_datas.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
