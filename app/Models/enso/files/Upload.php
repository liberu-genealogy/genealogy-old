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

    protected $optimizeImages = true;

    protected $folder = 'files';

    public static function store(array $files)
    {
        return (new UploadManager($files))->handle();
    }
}
