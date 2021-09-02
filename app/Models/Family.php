<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class Family extends \FamilyTree365\LaravelGedcom\Models\Family
{
    use TableCache, HasFactory;
}
