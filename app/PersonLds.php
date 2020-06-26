<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $group
 * @property int $gid
 * @property string $type
 * @property string $stat
 * @property string $date
 * @property string $plac
 * @property string $temp
 * @property string $slac_famc
 * @property string $created_at
 * @property string $updated_at
 */
class PersonLds extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['group', 'gid', 'type', 'stat', 'date', 'plac', 'temp', 'slac_famc', 'created_at', 'updated_at'];
}
