<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\App\Traits\TableCache;

/**
 * @property int $id
 * @property string $group
 * @property int $gid
 * @property string $name
 * @property int $addr_id
 * @property string $rin
 * @property string $rfn
 * @property string $lang
 * @property string $phon
 * @property string $created_at
 * @property string $updated_at
 */
class Subm extends Model
{
    use TableCache;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['group', 'gid', 'name', 'addr_id', 'rin', 'rfn', 'lang', 'phon', 'created_at', 'updated_at'];
}
