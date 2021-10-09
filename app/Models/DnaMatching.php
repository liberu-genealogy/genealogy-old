<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DnaMatching extends Model
{
    protected $fillable = [
        'file1',
        'file2',
        'image',
    ];
}
