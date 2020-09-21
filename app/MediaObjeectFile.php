<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\Traits\TableCache;

class MediaObjeectFile extends Model
{
    //
    use TableCache;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'media_objects_file';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['gid', 'group', 'form', 'medi', 'type', 'created_at', 'updated_at'];
}
