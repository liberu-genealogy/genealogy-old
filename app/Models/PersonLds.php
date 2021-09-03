<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class PersonLds extends \FamilyTree365\LaravelGedcom\Models\PersonLds
{
    use TableCache, HasFactory;
}
