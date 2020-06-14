<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $sour
 * @property string $titl
 * @property string $auth
 * @property string $data
 * @property string $text
 * @property string $publ
 * @property string $abbr
 * @property string $created_at
 * @property string $updated_at
 */
class Sour extends Model
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
    protected $fillable = ['sour', 'titl', 'auth', 'data', 'text', 'publ', 'abbr', 'created_at', 'updated_at'];

}
