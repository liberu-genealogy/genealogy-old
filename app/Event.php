<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\CommentsManager\app\Traits\Commentable;
use LaravelEnso\AddressesManager\app\Traits\Addressable;
use LaravelEnso\DocumentsManager\app\Traits\Documentable;

class Event extends Model
{
    use Commentable, Documentable, Addressable;

    protected $fillable = ['title', 'description', 'is_active', 'date'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function individuals()
    {
        return $this->belongsTo(Individual::class);
    }

    public function families()
    {
        return $this->belongsTo(Family::class);
    }
}
