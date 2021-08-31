<?php

namespace App\Models;

use LaravelEnso\Tables\Traits\TableCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FamilySlgs extends \FamilyTree365\LaravelGedcom\Models\FamilySlgs
{
    use TableCache, HasFactory;
}
