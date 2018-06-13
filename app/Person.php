<?php

namespace App;

use NeoEloquent;

class Person extends NeoEloquent
{
    protected $fillable = ['name'];

    protected $connection = 'neo4j';
}
