<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class PersonAnci extends \FamilyTree365\LaravelGedcom\Models\PersonAnci
{
    use TableCache, HasFactory;
}
