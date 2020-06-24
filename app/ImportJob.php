<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $slug
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class ImportJob extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'importjobs';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'slug', 'status', 'created_at', 'updated_at'];

}
