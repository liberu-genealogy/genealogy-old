<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subn extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'subns';

    /**
     * @var array
     */
    protected $fillable = ['subm', 'famf', 'temp', 'ance', 'desc','ordi', 'rin'];

}
