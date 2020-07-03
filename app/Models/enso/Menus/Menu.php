<?php

namespace App\Models\enso\Menus;

use App\Models\enso\Permissions\Permission;
use App\Models\enso\Roles\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use LaravelEnso\Menus\Exceptions\Menu as Exception;
use LaravelEnso\Tables\Traits\TableCache;

/**
 * @property int $id
 * @property int $parent_id
 * @property int $permission_id
 * @property string $name
 * @property string $icon
 * @property int $order_index
 * @property bool $has_children
 * @property string $created_at
 * @property string $updated_at
 * @property Menu $menu
 * @property Permission $permission
 * @property Role[] $roles
 */
class Menu extends Model
{
    use TableCache;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'permission_id', 'name', 'icon', 'order_index', 'has_children', 'created_at', 'updated_at'];

    protected $casts = [
        'has_children' => 'boolean', 'parent_id' => 'integer', 'permission_id' => 'integer',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class);
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function rolesWhereIsDefault()
    {
        return $this->hasMany(Role::class);
    }

    public function getComputedIconAttribute()
    {
        return Str::contains($this->icon, ' ')
            ? explode(' ', $this->icon)
            : $this->icon;
    }

    public function delete()
    {
        if ($this->children()->exists()) {
            throw Exception::hasChildren();
        }

        if ($this->rolesWhereIsDefault()->exists()) {
            throw Exception::usedAsDefault();
        }

        parent::delete();
    }

    public function scopeIsParent(Builder $query)
    {
        return $query->whereHasChildren(true);
    }

    public function scopeIsNotParent(Builder $query)
    {
        return $query->whereHasChildren(false);
    }
}
