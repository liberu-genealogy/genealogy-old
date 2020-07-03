<?php

namespace App\Models\enso\core;

use App\Models\Roles\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use LaravelEnso\Core\App\Exceptions\UserGroupConflict;
use LaravelEnso\Rememberable\App\Traits\Rememberable;
use LaravelEnso\Roles\App\Traits\HasRoles;
use LaravelEnso\Tables\App\Traits\TableCache;

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
    use HasRoles, Rememberable, TableCache;

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
