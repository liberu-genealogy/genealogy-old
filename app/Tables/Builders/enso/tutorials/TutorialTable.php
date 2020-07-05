<?php

namespace App\Tables\Builders\enso\Tutorials;

use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;
use App\Models\enso\Tutorials\Tutorial;

class TutorialTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../../Templates/enso/tutorials/tutorials.json';

    public function query(): Builder
    {
        return Tutorial::selectRaw('
            tutorials.id, permissions.name as permission, tutorials.element,
            tutorials.title, tutorials.placement, tutorials.order_index, tutorials.created_at
        ')->join('permissions', 'permissions.id', '=', 'tutorials.permission_id');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
