<?php

namespace App\Models\enso\companies;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\RoutesNotifications;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use LaravelEnso\Addresses\Traits\Addressable;
use LaravelEnso\DynamicMethods\Traits\Abilities;
use LaravelEnso\Helpers\Traits\AvoidsDeletionConflicts;
use LaravelEnso\Helpers\Traits\CascadesMorphMap;
use App\Person;
use LaravelEnso\Rememberable\Traits\Rememberable;
use LaravelEnso\Tables\Traits\TableCache;
use LaravelEnso\TrackWho\Traits\CreatedBy;
use LaravelEnso\TrackWho\Traits\UpdatedBy;

class Company extends Model
{
    use Abilities,
        Addressable,
        AvoidsDeletionConflicts,
        CascadesMorphMap,
        CreatedBy,
        Rememberable,
        RoutesNotifications,
        TableCache,
        UpdatedBy;

    protected $guarded = ['id'];

    protected $casts = ['pays_vat' => 'boolean', 'is_tenant' => 'boolean'];

    public function people()
    {
        return $this->belongsToMany(Person::class)
            ->withPivot('position');
    }

    public static function owner()
    {
        return static::cacheGet(Config::get('enso.config.ownerCompanyId'));
    }

    public function isTenant()
    {
        return $this->is_tenant;
    }

    public function scopeTenant($query)
    {
        $query->whereIsTenant(true);
    }

    public function mandatary()
    {
        return $this->people()
            ->withPivot('position')
            ->wherePivot('is_mandatary', true)
            ->first();
    }

    public function attachPerson(int $personId, ?string $position = null)
    {
        $this->people()->attach($personId, [
            'is_main' => false,
            'is_mandatary' => false,
            'position' => $position,
        ]);
    }

    public function updateMandatary(?int $mandataryId)
    {
        $pivotIds = $this->people->pluck('id')->reduce(
            fn ($pivot, $value) => $pivot
                ->put($value, ['is_mandatary' => $value === $mandataryId]),
            new Collection()
        )->toArray();

        $this->people()->sync($pivotIds);
    }
}
