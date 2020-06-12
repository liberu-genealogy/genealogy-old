<?php

namespace App\Forms\Builders;

use App\Family;
use App\Person;
use App\Type;
use LaravelEnso\Forms\App\Services\Form;

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
    ->options('husband_id', Person::all())
    ->options('wife_id', Person::all())
    ->options('type_id', Type::all())
    ->options('child_id', Person::all())
    ->create();
    }

    public function edit(Family $family)
    {
        return $this->form
        ->options('husband_id', Person::all())
        ->options('wife_id', Person::all())
        ->options('type_id', Type::all())
        ->append('family_id', $family->id)
        ->value('child_id', $family->children)
        ->options('child_id', Person::all())
        ->edit($family);
    }
}
