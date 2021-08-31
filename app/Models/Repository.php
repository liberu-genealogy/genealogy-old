<?php

namespace App\Models;

use LaravelEnso\Tables\Traits\TableCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Repository extends \FamilyTree365\LaravelGedcom\Models\Repository
{
    use TableCache, HasFactory;
}
