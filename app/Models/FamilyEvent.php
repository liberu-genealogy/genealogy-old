<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class FamilyEvent extends \FamilyTree365\LaravelGedcom\Models\FamilyEvent
{
    use TableCache, HasFactory;
}
