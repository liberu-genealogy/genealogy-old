<?php

namespace App\Models\enso\Permissions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use App\Models\enso\Menus\Menu;
use LaravelEnso\Permissions\App\Enums\Types;
use LaravelEnso\Permissions\App\Enums\Verbs;
use LaravelEnso\Permissions\App\Exceptions\Permission as Exception;
use App\Models\Roles\Role;
use LaravelEnso\Roles\App\Traits\HasRoles;
use LaravelEnso\Tables\App\Traits\TableCache;
use App\Models\Tutorials\Tutorial;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property boolean $is_default
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
