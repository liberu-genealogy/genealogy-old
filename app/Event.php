<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // public function __construct(Array $attributes = [])
    // {
    //     parent::__construct($attributes);
    //     $db = \Session::get('db');
    //     error_log('Event+++++++++++++++++++++++++++++++++++'.$db);
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
    protected $gedcom_event_names = [];

    public function place()
    {
        return $this->hasOne(Place::class, 'id', 'places_id');
    }

    public function getPlacename()
    {
        if ($this->place) {
            return $this->place->title;
        } else {
            return 'unknown place';
        }
    }

    public function getTitle()
    {
        return $this->gedcom_event_names[$this->title] ?? $this->title;
    }

    public function scopeOrderByDate($query)
    {
        return $query->orderBy('year')->orderBy('month')->orderBy('day');
    }
}
