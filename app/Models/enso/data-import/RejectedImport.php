<?php

namespace App\Models\enso\dataimport;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\enso\files\Attachable;
use App\Traits\enso\files\HasFile;
use LaravelEnso\Helpers\Traits\CascadesMorphMap;
class RejectedImport extends Model implements Attachable
{
    //
    use CascadesMorphMap, HasFile;

    protected $guarded = ['id'];
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
    public function dataImport()
    {
        return $this->belongsTo(DataImport::class);
    }

    public function folder(): string
    {
        return 'imports'
            .DIRECTORY_SEPARATOR
            .'rejected_'.$this->data_import_id;
    }    
}
