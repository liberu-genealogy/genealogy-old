<?php

namespace App\Models\enso\dataimport;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use App\Contracts\enso\files\Attachable;
use App\Traits\enso\files\HasFile;
use LaravelEnso\Helpers\Traits\CascadesMorphMap;
class ImportTemplate extends Model implements Attachable
{
    use CascadesMorphMap, HasFile;
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
    protected $extensions = ['xlsx'];

    protected $guarded = ['id'];

    protected $folder = 'imports';

    public function store(UploadedFile $file)
    {
        tap($this)->save()
            ->upload($file);
    }
}
