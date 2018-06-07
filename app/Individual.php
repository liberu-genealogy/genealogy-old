<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Contacts\app\Traits\Contactable;
use LaravelEnso\CommentsManager\app\Traits\Commentable;
use LaravelEnso\AddressesManager\app\Traits\Addressable;
use LaravelEnso\DocumentsManager\app\Traits\Documentable;
use App\Traits\EventTrait;

class Individual extends Model
{
    use Contactable, Commentable, Documentable, Addressable,EventTrait;

    protected $appends = ['name'];

    protected $fillable = ['first_name', 'last_name', 'is_active', 'gender_id'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function families()
    {
        return $this->belongsToMany(Family::class);
    }

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
