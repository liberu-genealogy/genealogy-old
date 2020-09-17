<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\Traits\TableCache;

class SourceRepo extends Model
{
    use TableCache;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'source_repo';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['group', 'gid', 'repo_id','caln','created_at', 'updated_at'];

}
