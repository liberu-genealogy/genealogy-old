<?php

namespace App\Models;

use LaravelEnso\Tables\Traits\TableCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SourceRef extends \FamilyTree365\LaravelGedcom\Models\SourceRef
{
    use TableCache, HasFactory;
}
