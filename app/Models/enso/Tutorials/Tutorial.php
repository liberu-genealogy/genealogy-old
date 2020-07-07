<?php

namespace App\Models\enso\Tutorials;

use App\Models\Permissions\Permission;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\Traits\TableCache;

/**
 * @property int $id
 * @property int $permission_id
 * @property string $element
 * @property string $title
 * @property string $content
 * @property bool $placement
 * @property int $order_index
 * @property string $created_at
 * @property string $updated_at
 * @property Permission $permission
 */
class Tutorial extends Model
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
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tutorials';

    /**
     * @var array
     */
    protected $fillable = [
        'permission_id', 'element', 'title', 'content', 'placement',
        'order_index',
    ];

    protected $casts = [
        'permission_id' => 'integer', 'placement' => 'integer',
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
