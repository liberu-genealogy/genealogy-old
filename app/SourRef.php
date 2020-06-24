<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $group
 * @property int $gid
 * @property string $sour
 * @property string $text
 * @property string $quay
 * @property string $page
 * @property string $created_at
 * @property string $updated_at
 */
class SourRef extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'sourref';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['group', 'gid', 'sour', 'text', 'quay', 'page', 'created_at', 'updated_at'];

}
