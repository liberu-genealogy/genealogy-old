<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\CommentsManager\app\Traits\Commentable;
use LaravelEnso\AddressesManager\app\Traits\Addressable;
use LaravelEnso\DocumentsManager\app\Traits\Documentable;
use App\Traits\HasIndividuals;

class Family extends Model
{
    use Commentable, Documentable, Addressable, HasIndividuals;

    protected $fillable = ['description', 'is_active'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function individuals()
    {
        return $this->hasMany(Individual::class);
    }

    public function events()
    {
        return $this->belongsTo(Event::class);
    }

    public function getIndividualListAttribute()
    {
        return $this->individuals()->pluck('id');
    }
}
