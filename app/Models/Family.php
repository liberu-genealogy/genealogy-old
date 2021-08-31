<?php

namespace App\Models;

use LaravelEnso\Tables\Traits\TableCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Family extends \FamilyTree365\LaravelGedcom\Models\Family
{
      use TableCache, HasFactory;
}
