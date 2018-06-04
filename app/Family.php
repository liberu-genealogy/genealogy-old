<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\CommentsManager\app\Traits\Commentable;
use LaravelEnso\DocumentsManager\app\Traits\Documentable;
use LaravelEnso\AddressesManager\app\Traits\Addressable;

class Family extends Model
{
    use Commentable, Documentable, Addressable;

    protected $fillable = ['description','individual_1', 'individual_2', 'is_active'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function individuals()
    {
        return $this->hasMany(Individual::class);
    }

    public function events()
    {
        return $this->belongsTo(Family::class);
    }
}
