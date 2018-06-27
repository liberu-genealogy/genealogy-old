<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gedcom extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function gedcom()
    {
      $this->morphTo();
    }

}
