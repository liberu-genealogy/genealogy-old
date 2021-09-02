<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class PersonAsso extends \FamilyTree365\LaravelGedcom\Models\PersonAsso
{
    use TableCache, HasFactory;
}
