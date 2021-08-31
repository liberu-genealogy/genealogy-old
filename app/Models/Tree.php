<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\Traits\TableCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tree extends Model
{
    use TableCache, HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['name', 'description'];
}
