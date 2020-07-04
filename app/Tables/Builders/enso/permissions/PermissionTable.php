<?php

namespace App\Tables\Builders\enso\Permissions;

use App\Models\enso\Permissions\Permission;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class PermissionTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../../Templates/enso/permissions/permissions.json';

    public function query(): Builder
    {
        return Permission::with('menu:permission_id')->selectRaw('
            permissions.id, permissions.name, permissions.description,
            permissions.created_at, permissions.is_default
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
