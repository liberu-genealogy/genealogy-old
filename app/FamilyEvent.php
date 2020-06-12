<?php

namespace App;

use ModularSoftware\LaravelGedcom\Observers\EventActionsObserver;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyEvent extends Event
{
    use SoftDeletes;

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
