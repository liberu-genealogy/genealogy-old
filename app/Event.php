<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\CommentsManager\app\Traits\Commentable;
use LaravelEnso\DocumentsManager\app\Traits\Documentable;
use LaravelEnso\AddressesManager\app\Traits\Addressable;

class Event extends Model
{
    use Commentable, Documentable, Addressable;

    protected $fillable = ['name', 'description', 'is_active','date'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function individuals()
    {
        return $this->belongsTo(App\Individual::class);
    }

    public function families()
    {
        return $this->belongsTo(App\Family::class);
    }
}
