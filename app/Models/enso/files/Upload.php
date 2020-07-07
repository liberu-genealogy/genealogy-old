<?php

namespace App\Models\enso\files;

use App\Contracts\enso\files\Attachable;
use App\Contracts\enso\files\AuthorizesFileAccess;
use App\Service\enso\files\UploadManager;
use App\Traits\enso\files\FilePolicies;
use App\Traits\enso\files\HasFile;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Helpers\Traits\CascadesMorphMap;

class Upload extends Model implements Attachable, AuthorizesFileAccess
{
    use CascadesMorphMap, HasFile, FilePolicies;
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
    protected $optimizeImages = true;

    protected $folder = 'files';

    public static function store(array $files)
    {
        return (new UploadManager($files))->handle();
    }
}
