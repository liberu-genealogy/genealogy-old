<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $gid
 * @property string $note
 * @property string $rin
 * @property string $created_at
 * @property string $updated_at
 */
class Noteged extends Model
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
    protected $fillable = ['gid', 'note', 'rin', 'created_at', 'updated_at'];

}
