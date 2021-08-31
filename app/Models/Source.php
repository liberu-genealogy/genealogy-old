<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class Source extends \FamilyTree365\LaravelGedcom\Models\Source
{
    use TableCache, HasFactory;
}
