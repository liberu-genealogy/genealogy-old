<?php

namespace App\Tables\Builders;

use App\Models\MediaObject;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class MediaObjectTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/mediaobjects.json';

    public function query(): Builder
    {
        return MediaObject::selectRaw('
            media_objects.id, media_objects.gid, media_objects.titl, media_objects.rin
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
