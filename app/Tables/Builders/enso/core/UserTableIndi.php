<?php

namespace App\Tables\Builders\enso\core;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;
use Auth;
class UserTableIndi implements Table
{
    protected const TemplatePath = __DIR__.'/../../../Templates/enso/core/user.json';

    protected $query;

    public function query(): Builder
    {
        return User::with('person:id,appellative,name', 'avatar:id,user_id')->selectRaw('
            users.id, user_groups.name as userGroup, people.name, people.appellative,
            people.phone, users.email, roles.name as role, users.is_active,
            users.created_at, users.person_id
        ')->join('people', 'users.person_id', '=', 'people.id')
            ->join('user_groups', 'users.group_id', '=', 'user_groups.id')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('users.id', Auth::user()->id);
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
