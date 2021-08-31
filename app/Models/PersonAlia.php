<?php

namespace App\Models;

use LaravelEnso\Tables\Traits\TableCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonAlia extends \FamilyTree365\LaravelGedcom\Models\PersonAlia
{
    use TableCache, HasFactory;
}
