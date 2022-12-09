<?php

namespace App\Models;

use App\Traits\TenantConnectionResolver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class PersonNameFone extends \FamilyTree365\LaravelGedcom\Models\PersonNameFone
{
    use TableCache, HasFactory, TenantConnectionResolver;
}
