<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\Traits\TableCache;

/**
 * @property int $id
 * @property string $group
 * @property int $gid
 * @property int $sour_id
 * @property string $text
 * @property string $quay
 * @property string $page
 * @property string $created_at
 * @property string $updated_at
 */
class SourceRef extends Model
{
    use TableCache;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'source_ref';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['group', 'gid', 'sour_id', 'text', 'quay', 'page', 'created_at', 'updated_at'];
}
