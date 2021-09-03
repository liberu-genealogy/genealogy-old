<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class PersonEvent extends \FamilyTree365\LaravelGedcom\Models\PersonEvent
{
    use TableCache, HasFactory;
}
