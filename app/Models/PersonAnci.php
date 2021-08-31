<?php

namespace App\Models;

use LaravelEnso\Tables\Traits\TableCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonAnci extends \FamilyTree365\LaravelGedcom\Models\PersonAnci
{
    use TableCache, HasFactory;
}
