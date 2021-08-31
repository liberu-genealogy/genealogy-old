<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class PersonName extends \FamilyTree365\LaravelGedcom\Models\PersonName
{
    use TableCache, HasFactory;
}
