<?php

namespace App\Models\enso\Localisation;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Helpers\Contracts\Activatable;
use LaravelEnso\Helpers\Traits\ActiveState;
use LaravelEnso\Multitenancy\Traits\SystemConnection;
use LaravelEnso\Tables\Traits\TableCache;

/**
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $flag
 * @property bool $is_rtl
 * @property bool $is_active
 * @property string $created_at
 * @property string $updated_at
 */
class Language extends Model implements Activatable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'languages';

    use ActiveState, TableCache, SystemConnection;

    public const FlagClassPrefix = 'flag-icon flag-icon-';

    protected $fillable = ['name', 'display_name', 'flag', 'is_rtl', 'is_active'];

    protected $casts = ['is_rtl' => 'boolean', 'is_active' => 'boolean'];

    public function updateWithFlagSufix($attributes, string $sufix)
    {
        $this->fill($attributes);

        $this->flag = self::FlagClassPrefix.$sufix;

        $this->update();
    }

    public function storeWithFlagSufix($attributes, string $sufix)
    {
        $this->fill($attributes);

        $this->flag = self::FlagClassPrefix.$sufix;

        return tap($this)->save();
    }

    public function scopeExtra($query)
    {
        return $query->where('name', '<>', config('app.fallback_locale'));
    }
}
