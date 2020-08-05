<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelEnso\Tables\Traits\TableCache;
use ModularSoftware\LaravelGedcom\Observers\EventActionsObserver;

class FamilyEvent extends Event
{
    use SoftDeletes;
    use TableCache;
    // public function __construct(Array $attributes = [])
    // {
    //     parent::__construct($attributes);
    //     $db = \Session::get('db');
    //     error_log('+++FamilyEvent++++++++++++++++++++++++++++++++'.$db);
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
