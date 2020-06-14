<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $gid
 * @property string $form
 * @property string $titl
 * @property string $blob
 * @property string $rin
 * @property string $file
 * @property string $created_at
 * @property string $updated_at
 */
class Object extends Model
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
    protected $fillable = ['gid', 'form', 'titl', 'blob', 'rin', 'file', 'created_at', 'updated_at'];

}
