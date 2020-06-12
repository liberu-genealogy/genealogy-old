<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $repo
 * @property string $name
 * @property string $addr
 * @property string $rin
 * @property string $phon
 * @property string $created_at
 * @property string $updated_at
 */
class Repoged extends Model
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
    protected $fillable = ['repo', 'name', 'addr', 'rin', 'phon', 'created_at', 'updated_at'];

}
