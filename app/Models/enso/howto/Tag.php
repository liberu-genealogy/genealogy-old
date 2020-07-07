<?php

namespace App\Models\enso\howto;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\HowTo\Exceptions\Tag as Exception;

class Tag extends Model
{
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
    protected $table = 'how_to_tags';

    protected $guarded = ['id'];

    public function videos()
    {
        return $this->belongsToMany(
            Video::class,
            'how_to_tag_how_to_video',
            'how_to_tag_id',
            'how_to_video_id'
        );
    }

    public function delete()
    {
        if ($this->videos()->exists()) {
            throw Exception::inUse();
        }

        parent::delete();
    }
}
