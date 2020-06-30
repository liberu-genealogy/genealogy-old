<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $token
 * @property string $ip_address
 * @property string $created_at
 * @property string $updated_at
 */
class Activation extends Model
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
    protected $fillable = ['user_id', 'token', 'ip_address', 'created_at', 'updated_at'];

}
