<?php

namespace App;

use App\Traits\Events;
use App\Traits\HasIndividuals;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\AddressesManager\app\Traits\Addressable;
use LaravelEnso\CommentsManager\app\Traits\Commentable;
use LaravelEnso\DocumentsManager\app\Traits\Documentable;

class Family extends Model
{
    use Commentable, Documentable, Addressable, HasIndividuals, Events;

    protected $fillable = ['description', 'is_active', 'father_id', 'mother_id', 'type_id'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function individuals()
    {
        return $this->belongsToMany(Individual::class)->withPivot('type_id');
    }

    public function getIndividualListAttribute()
    {
        return $this->individuals()->where('individuals.id', '!=', $this->father_id)
            ->where('individuals.id', '!=', $this->mother_id)
            ->pluck('individuals.id');
    }
    
   public function info(){
        return $this->belongsTo(Individual::class,'father_id','id');
    }

    public function spouse(){
         return $this->hasOne(Individual::class,'id','mother_id');
    }  

    public function gedcom()
    {
        return $this->morphMany('App\Gedcom', 'gedcom');
    }
}
