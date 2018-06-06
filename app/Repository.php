<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{

    protected $fillable = ['name', 'description', 'type_id', 'is_active'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];


    public function sources()
    {
        return $this->hasMany(Source::class);
    }

}
