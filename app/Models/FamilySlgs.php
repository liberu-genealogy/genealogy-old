<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class FamilySlgs extends \FamilyTree365\LaravelGedcom\Models\FamilySlgs
{
    use TableCache, HasFactory;
}
