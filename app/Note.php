<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\App\Traits\TableCache;

class Note extends Model
{
    use TableCache;

    protected $fillable = ['name', 'description', 'is_active', 'type_id'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function person()
    {
        return $this->belongsToMany(Person::class);
    }
}
