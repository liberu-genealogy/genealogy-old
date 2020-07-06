<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\Traits\TableCache;

/**
 * @property int $id
 * @property string $group
 * @property int $gid
 * @property string $name
 * @property int $addr_id
 * @property string $rin
 * @property string $rfn
 * @property string $lang
 * @property string $phon
 * @property string $created_at
 * @property string $updated_at
 */
class Subm extends Model
{
    use TableCache;
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
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['group', 'gid', 'name', 'addr_id', 'rin', 'rfn', 'lang', 'phon', 'created_at', 'updated_at'];
}
