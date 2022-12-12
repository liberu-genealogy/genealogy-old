<?php

namespace App\Models;

use App\Traits\TenantConnectionResolver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class Subn extends \FamilyTree365\LaravelGedcom\Models\Subn
{
    use TableCache, HasFactory, TenantConnectionResolver;
}
