<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Contacts\app\Traits\Contactable;
use LaravelEnso\CommentsManager\app\Traits\Commentable;
use LaravelEnso\AddressesManager\app\Traits\Addressable;
use LaravelEnso\DocumentsManager\app\Traits\Documentable;

class Individual extends Model
{
    use Contactable, Commentable, Documentable, Addressable;

    protected $fillable = ['first_name', 'last_name', 'is_active'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function families()
    {
        return $this->belongsTo(Family::class);
    }
}
