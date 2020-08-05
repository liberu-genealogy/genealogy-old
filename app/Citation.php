<?php

namespace App;

use App\Source;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\Traits\TableCache;

class Citation extends Model
{
    use TableCache;
    // public function __construct(Array $attributes = [])
    // {
    //     parent::__construct($attributes);
    //     $db = \Session::get('db');
    //     error_log('Citation+++++++++++++++++++++++++++++++++++'.$db);
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
    protected $fillable = ['name', 'description', 'repository_id', 'volume', 'page', 'is_active', 'confidence', 'source_id'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function sources()
    {
        return $this->belongsToMany(Source::class);
    }
}
