<?php

namespace App;

use Ramsey\Uuid\Uuid;
use App\Traits\Events;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\TrackWho\app\Traits\CreatedBy;
use LaravelEnso\TrackWho\app\Traits\UpdatedBy;
use LaravelEnso\Discussions\app\Traits\Discussable;
use LaravelEnso\ActivityLog\app\Traits\LogsActivity;
use LaravelEnso\CommentsManager\app\Traits\Commentable;
use LaravelEnso\AddressesManager\app\Traits\Addressable;
use LaravelEnso\DocumentsManager\app\Traits\Documentable;
use LaravelEnso\Companies\app\Models\Contact;

class Individual extends Model
{
    use Addressable, Commentable, CreatedBy, Discussable,
        Documentable, LogsActivity, UpdatedBy, Events;

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    protected $appends = ['name'];

    protected $fillable = ['first_name', 'last_name', 'is_active', 'gender', 'type_id'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    protected $loggableLabel = 'name';

    protected $loggable = ['name', 'gender'];

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

    public function gedcom()
    {
        return $this->morphMany('App\Gedcom', 'gedcom');
    }
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

}

