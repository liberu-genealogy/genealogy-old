<?php

namespace App\Models;

use LaravelEnso\Tables\Traits\TableCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonEvent extends \FamilyTree365\LaravelGedcom\Models\PersonEvent
{
    use TableCache, HasFactory;
}
