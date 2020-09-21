<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\Traits\TableCache;

/**
 * @property int $id
 * @property string $group
 * @property int $gid
 * @property string $type
 * @property string $name
 * @property string $npfx
 * @property string $givn
 * @property string $nick
 * @property string $spfx
 * @property string $surn
 * @property string $nsfx
 * @property string $created_at
 * @property string $updated_at
 */
class PersonNameFone extends Model
{
    use TableCache;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'person_name_fone';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['group', 'gid', 'type', 'name', 'npfx', 'givn', 'nick', 'spfx', 'surn', 'nsfx', 'created_at', 'updated_at'];
}
