<?php

namespace App\Models;

use LaravelEnso\Tables\Traits\TableCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonLds extends \FamilyTree365\LaravelGedcom\Models\PersonLds
{
    use TableCache, HasFactory;
}
