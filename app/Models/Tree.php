<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\Traits\TableCache;

class Tree extends Model
{
    use TableCache;

    /**
     * @var array
     */
    protected $fillable = ['name', 'description'];
}
