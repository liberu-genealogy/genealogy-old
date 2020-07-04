<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelEnso\Tables\Traits\TableCache;
use ModularSoftware\LaravelGedcom\Observers\EventActionsObserver;

class FamilyEvent extends Event
{
    use SoftDeletes;
    use TableCache;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'family_events';

    protected $fillable = [
        'family_id',
        'places_id',
        'date',
        'title',
        'description',
        'year',
        'month',
        'day',
        'type',
        'plac',
        'phon',
        'caus',
        'age',
        'husb',
        'wife',
    ];

    public static function boot()
    {
        parent::boot();

        self::observe(new EventActionsObserver());
    }

    public function family()
    {
        return $this->hasOne(Family::class, 'id', 'family_id');
    }
}
