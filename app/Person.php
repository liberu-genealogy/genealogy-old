<?php

namespace App;

use NeoEloquent;
use Ramsey\Uuid\Uuid;

class Person extends NeoEloquent
{
    protected $fillable = ['name'];

    protected $connection = 'neo4j';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Uuid::uuid4();
        });
    }

    public function father()
    {
        return $this->belongsTo('App\Person', 'FATHER');
    }

    public function mother()
    {
        return $this->belongsTo('App\Person', 'MOTHER');
    }
}
