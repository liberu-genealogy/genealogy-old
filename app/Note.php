<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['name', 'description', 'is_active', 'type_id'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function individuals()
    {
        return $this->belongsToMany(Individual::class);
    }
}
