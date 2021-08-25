<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class Addr extends \FamilyTree365\LaravelGedcom\Models\Addr
{
    use TableCache, HasFactory;
}
