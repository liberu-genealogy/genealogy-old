<?php

namespace App\Forms\Builders;

use App\Family;
use App\Type;
use LaravelEnso\Forms\App\Services\Form;
use LaravelEnso\People\App\Models\Person;

class FamilyForm
{
    protected const TemplatePath = __DIR__.'/../Templates/families.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form
    ->value('personList', Person::all())
    ->options('father_id', Person::all())
    ->options('mother_id', Person::all())
    ->options('type_id', Type::all())
    ->create();
    }

    public function edit(Family $family)
    {
        return $this->form
    ->value('personList', Family::personList())
    ->options('father_id', Person::all())
    ->options('mother_id', Person::all())
    ->options('type_id', Type::all())
        ->append('family_id', $family->id)
    ->create();
    }
}
