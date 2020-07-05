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

    protected $extensions = ['xlsx'];

    protected $guarded = ['id'];

    protected $folder = 'imports';

    public function store(UploadedFile $file)
    {
        tap($this)->save()
            ->upload($file);
    }
}
