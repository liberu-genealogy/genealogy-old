<?php

namespace App\Forms\Builders;

use App\Family;
use App\Type;
use LaravelEnso\People\App\Models\Person;
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
	->options('person_id', Person::select())
	->options('type_id', Type::select())
	->create();
    }

    public function edit(Family $family)
    {
        return $this->form
	->options('person_id', Person::select())
	->options('type_id', Type::select())
        ->append('family_id', $family->id)
	->create();

    }
}
