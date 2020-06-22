<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $subm
 * @property string $name
 * @property string $addr
 * @property string $rin
 * @property string $rfn
 * @property string $lang
 * @property string $phon
 * @property string $created_at
 * @property string $updated_at
 */
class Subm extends Model
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
    protected $fillable = ['subm', 'name', 'addr', 'rin', 'rfn', 'lang', 'phon', 'created_at', 'updated_at'];
}
