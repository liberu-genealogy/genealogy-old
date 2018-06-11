<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\AddressesManager\app\Traits\Addressable;
use LaravelEnso\CommentsManager\app\Traits\Commentable;

class Repository extends Model
{
    use Commentable, Addressable;

    protected $fillable = ['name', 'description', 'type_id', 'is_active'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function sources()
    {
        return $this->hasMany(Source::class);
    }
}
