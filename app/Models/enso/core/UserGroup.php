<?php

namespace App\Models\enso\core;

use App\Models\enso\Roles\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use LaravelEnso\Core\Exceptions\UserGroupConflict;
use LaravelEnso\Multitenancy\Traits\SystemConnection;
use LaravelEnso\Rememberable\Traits\Rememberable;
use LaravelEnso\Roles\Traits\HasRoles;
use LaravelEnso\Tables\Traits\TableCache;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property RoleUserGroup[] $roleUserGroups
 * @property User[] $users
 */
class UserGroup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_groups';
    use HasRoles, Rememberable, TableCache, SystemConnection;

    protected $fillable = ['name', 'description'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function users()
    {
        return $this->hasMany(User::class, 'group_id');
    }

    public function delete()
    {
        if ($this->users()->exists()) {
            throw UserGroupConflict::hasUsers();
        }

        parent::delete();
    }

    public function scopeVisible($query)
    {
        return $query->when(
            ! Auth::user()->belongsToAdminGroup(),
            fn ($query) => $query->whereId(Auth::user()->group_id)
        );
    }
}
