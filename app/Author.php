<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\App\Traits\TableCache;

class Author extends Model
{
    use TableCache;

    protected $fillable = ['description', 'is_active', 'name'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

}
