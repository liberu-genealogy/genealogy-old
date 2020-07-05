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
