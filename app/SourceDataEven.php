<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $date
 * @property string $plac
 * @property string $created_at
 * @property string $updated_at
 */
class SourceDataEven extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'source_data_even';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['date', 'plac', 'created_at', 'updated_at'];
}
