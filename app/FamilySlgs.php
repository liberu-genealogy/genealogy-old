<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $family_id
 * @property string $stat
 * @property string $date
 * @property string $plac
 * @property string $temp
 * @property string $created_at
 * @property string $updated_at
 */
class FamilySlgs extends Model
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
    protected $fillable = ['family_id', 'stat', 'date', 'plac', 'temp', 'created_at', 'updated_at'];
}
