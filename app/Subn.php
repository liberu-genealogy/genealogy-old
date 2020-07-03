<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\App\Traits\TableCache;

class Subn extends Model
{
    use TableCache;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subns';

    /**
     * @var array
     */
    protected $fillable = ['subm', 'famf', 'temp', 'ance', 'desc', 'ordi', 'rin'];
}
