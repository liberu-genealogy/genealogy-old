<?php
namespace App;

use NeoEloquent;

class Person extends NeoEloquent
{
    protected $fillable = ['uuid', 'name'];

    protected $connection = 'neo4j';



    public function father()
    {
        return $this->belongsTo('App\Person', 'FATHER');
    }

    public function mother()
    {
        return $this->belongsTo('App\Person', 'MOTHER');
    }

}
