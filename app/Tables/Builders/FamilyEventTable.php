<?php

namespace App\Tables\Builders;

use App\Models\FamilyEvent;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class FamilyEventTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/familyEvents.json';

    public function query(): Builder
    {
        return FamilyEvent::selectRaw('
            family_events.id, family_events.date, family_events.title, family_events.description, family_events.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
