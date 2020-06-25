<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $adr1
 * @property string $adr2
 * @property string $city
 * @property string $stae
 * @property string $post
 * @property string $ctry
 * @property string $created_at
 * @property string $updated_at
 */
class Addr extends Model
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
    protected $fillable = ['adr1', 'adr2', 'city', 'stae', 'post', 'ctry', 'created_at', 'updated_at'];
}
