<?php

namespace App\Models\enso\Permissions;

use App\Models\enso\Menus\Menu;
use App\Models\Roles\Role;
use App\Models\Tutorials\Tutorial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use LaravelEnso\Permissions\Enums\Types;
use LaravelEnso\Permissions\Enums\Verbs;
use LaravelEnso\Permissions\Exceptions\Permission as Exception;
use LaravelEnso\Roles\Traits\HasRoles;
use LaravelEnso\Tables\Traits\TableCache;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property bool $is_default
 * @property string $created_at
 * @property string $updated_at
 * @property Menu[] $menuses
 * @property PermissionRole[] $permissionRoles
 * @property Tutorial[] $tutorials
 */
class Permission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions';

    use HasRoles, TableCache;

    protected $fillable = ['name', 'description', 'is_default'];

    protected $casts = ['is_default' => 'boolean'];

    public function menu()
    {
        return $this->hasOne(Menu::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function tutorials()
    {
        return $this->hasMany(Tutorial::class);
    }

    public function getTypeAttribute()
    {
        return $this->type();
    }

    public function type()
    {
        if ($this->relationLoaded('menu') && $this->menu !== null) {
            return Types::Menu;
        }

        return Verbs::get($this->method()) ?? Types::Link;
    }

    public function method()
    {
        $methods = optional(Route::getRoutes()->getByName($this->name))->methods();

        return $methods[0] ?? null;
    }

    public function scopeImplicit($query)
    {
        return $query->whereIsDefault(true);
    }

    public function delete()
    {
        if ($this->roles()->exists()) {
            throw Exception::roles();
        }

        if ($this->menu()->exists()) {
            throw Exception::menu();
        }

        parent::delete();
    }
}
