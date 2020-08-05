<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelEnso\Tables\Traits\TableCache;
use ModularSoftware\LaravelGedcom\Observers\EventActionsObserver;

class PersonEvent extends Event
{
    use TableCache;
    use SoftDeletes;
    // public function __construct(Array $attributes = [])
    // {
    //     parent::__construct($attributes);
    //     $db = \Session::get('db');
    //     error_log('+++++++++++++++++++++++++++++++++++'.$db);
    //     if(empty($db)) {
    //         $db = env('DB_DATABASE', 'enso');
    //     }
    //     if($db === env('DB_DATABASE')) {
    //         $key = 'database.connections.mysql.database';
    //         config([$key => $db]);
    //     } else {
    //         $key = 'database.connections.mysql.database';
    //         config([$key => $db]);
    //     }
    //     \DB::purge('mysql');
    //     \DB::reconnect('mysql');
    //     $this->setConnection('mysql');
    //     error_log('-----------------------------------'.$this->getConnection()->getDatabaseName());
    // }
    protected $dates = ['deleted_at'];

    protected $table = 'person_events';

    protected $fillable = [
        'person_id',
        'title',
        'type',
        'attr',
        'date',
        'plac',
        'phon',
        'caus',
        'age',
        'agnc',
        'places_id',
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
