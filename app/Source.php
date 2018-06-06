<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{

    protected $fillable = ['name', 'description', 'repository_id', 'author_id', 'is_active'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function repositories()
    {
        return $this->belongsTo(Repository::class);
    }

    public function citations()
    {
        return $this->hasMany(Citations::class);
    }

}
