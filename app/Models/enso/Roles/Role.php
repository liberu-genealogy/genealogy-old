<?php

namespace App\Models\enso\Roles;

use App\Models\enso\core\UserGroup;
use App\Models\enso\Menus\Menu;
use App\Models\enso\Permissions\Permission;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use LaravelEnso\Multitenancy\Traits\SystemConnection;
use LaravelEnso\Rememberable\Traits\Rememberable;
use LaravelEnso\Roles\Exceptions\RoleConflict;
use LaravelEnso\Roles\Services\ConfigWriter;
use LaravelEnso\Tables\Traits\TableCache;

/**
 * @property int $id
 * @property int $menu_id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property Menu $menu
 * @property PermissionRole[] $permissionRoles
 * @property RoleUserGroup[] $roleUserGroups
 * @property User[] $users
 */
class Role extends Model
{
    use Rememberable, TableCache, SystemConnection;

    protected $fillable = ['menu_id', 'name', 'display_name', 'description'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function userGroups()
    {
        return $this->belongsToMany(UserGroup::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    public function scopeVisible($query)
    {
        $fromAdminGroup = Auth::user()->belongsToAdminGroup();

        return $query->when(! $fromAdminGroup, fn ($query) => $query->whereHas(
            'userGroups',
            fn ($groups) => $groups->whereId(Auth::user()->group_id)
        ));
    }

    public function syncPermissions($permissionList)
    {
        $this->permissions()
            ->sync($permissionList);
    }

    public function addDefaultPermissions()
    {
        $this->permissions()
            ->sync(Permission::implicit()->pluck('id'));
    }

    public function delete()
    {
        if ($this->users()->exists()) {
            throw RoleConflict::inUse();
        }

        parent::delete();
    }

    public function writeConfig()
    {
        (new ConfigWriter($this))->handle();
    }
}
