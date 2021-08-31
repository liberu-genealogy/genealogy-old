<?php

namespace App\Models;

use LaravelEnso\Tables\Traits\TableCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SourceRepo extends \FamilyTree365\LaravelGedcom\Models\SourceRepo
{
    use TableCache, HasFactory;
}
