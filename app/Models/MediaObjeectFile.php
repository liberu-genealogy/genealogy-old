<?php

namespace App\Models;

use App\Traits\TenantConnectionResolver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaravelEnso\Tables\Traits\TableCache;

class MediaObjeectFile extends \FamilyTree365\LaravelGedcom\Models\MediaObjeectFile
{
    use TableCache, HasFactory, TenantConnectionResolver;
}
