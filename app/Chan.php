<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $group
 * @property int $gid
 * @property string $date
 * @property string $time
 * @property string $created_at
 * @property string $updated_at
 */
class Chan extends Model
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
    protected $fillable = ['group', 'gid', 'date', 'time', 'created_at', 'updated_at'];

}
