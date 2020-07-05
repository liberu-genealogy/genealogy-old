<?php

namespace App\Tables\Builders\enso\core;

use App\Models\enso\core\UserGroup;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class UserGroupTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../../Templates/enso/core/userGroups.json';

    public function query(): Builder
    {
        return UserGroup::selectRaw('id, name, description, created_at');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
