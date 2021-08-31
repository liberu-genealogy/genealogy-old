<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class Note extends \FamilyTree365\LaravelGedcom\Models\Note
{
    use HasFactory, TableCache;
}
