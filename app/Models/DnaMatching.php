<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\Traits\TableCache;

class DnaMatching extends Model
{
    use TableCache;

    protected $fillable = [
        'file1',
        'file2',
        'image',
    ];
}
