<?php

namespace App;

use App\Traits\EventTrait;
use App\Traits\HasIndividuals;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\CommentsManager\app\Traits\Commentable;
use LaravelEnso\AddressesManager\app\Traits\Addressable;
use LaravelEnso\DocumentsManager\app\Traits\Documentable;

class Family extends Model
{
    use Commentable, Documentable, Addressable, HasIndividuals, EventTrait;

    protected $fillable = ['description', 'is_active', 'father_id', 'mother_id', 'type_id'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function individuals()
    {
        return $this->belongsToMany(Individual::class);
    }

    public function getIndividualListAttribute()
    {
        return $this->individuals()->pluck('individuals.id');
    }
}
