<?php

namespace App\Models;

use App\Traits\TenantConnectionResolver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class SourceDataEven extends \FamilyTree365\LaravelGedcom\Models\SourceDataEven
{
    use TableCache, HasFactory, TenantConnectionResolver;
}
