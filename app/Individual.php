<?php

namespace App;

use App\Traits\Events;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\AddressesManager\app\Traits\Addressable;
use LaravelEnso\CommentsManager\app\Traits\Commentable;
use LaravelEnso\Contacts\app\Traits\Contactable;
use LaravelEnso\DocumentsManager\app\Traits\Documentable;
use Ramsey\Uuid\Uuid;

class Individual extends Model
{
    use Contactable, Commentable, Documentable, Addressable, Events;

    protected $appends = ['name'];

    protected $fillable = ['first_name', 'last_name', 'is_active', 'gender', 'type_id'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Uuid::uuid4();
        });
    }

    public function families()
    {
        return $this->belongsToMany(Family::class);
    }

    public function children()
    {
        return $this->belongsToMany(self::class, 'child_parent', 'parent_id', 'child_id');
    }

    public function parents()
    {
        return $this->belongsToMany(self::class, 'child_parent', 'child_id', 'parent_id');
    }

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function gedcom()
    {
        return $this->morphMany('App\Gedcom', 'gedcom');
    }
}
