<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class Author extends \FamilyTree365\LaravelGedcom\Models\Author
{
    use TableCache, HasFactory;
}
