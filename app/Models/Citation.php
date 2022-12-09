<?php

namespace App\Models;

use App\Traits\TenantConnectionResolver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class Citation extends \FamilyTree365\LaravelGedcom\Models\Citation
{
    use TableCache, HasFactory, TenantConnectionResolver;
}
