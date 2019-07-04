<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\CommentsManager\app\Traits\Comments;
use LaravelEnso\AddressesManager\app\Traits\Addresses;

class Repository extends Model
{
    use Comments, Addresses;

    protected $fillable = ['name', 'description', 'type_id', 'is_active'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function sources()
    {
        return $this->hasMany(Source::class);
    }
}
