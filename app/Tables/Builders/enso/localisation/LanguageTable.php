<?php

namespace App\Tables\Builders\enso\Localisation;

use Illuminate\Database\Eloquent\Builder;
use App\Models\enso\Localisation\Language;
use LaravelEnso\Tables\Contracts\Table;

class LanguageTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../../Templates/enso/localisation/languages.json';

    public function query(): Builder
    {
        return Language::selectRaw('
            languages.id, languages.display_name, languages.name,
            languages.flag, is_rtl, is_active, languages.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
