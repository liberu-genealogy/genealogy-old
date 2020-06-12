<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use ModularSoftware\LaravelGedcom\Observers\EventActionsObserver;

class PersonEvent extends Event
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'person_events';

    protected $fillable = [
        'person_id',
        'places_id',
        'date',
        'title',
        'description',
        'year',
        'month',
        'day',
    ];

    protected $gedcom_event_names = [
        'BIRT' => 'Birth',
        'DEAT' => 'Death',
    ];

    public static function boot()
    {
        parent::boot();

        self::observe(new EventActionsObserver);
    }

    public function person()
    {
        return $this->hasOne(Person::class, 'id', 'person_id');
    }
}
