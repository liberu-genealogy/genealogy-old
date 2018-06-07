<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $fillable = ['name', 'description', 'is_active'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function events()
    {
        return $this->belongsTo(Event::class);
    }
}
