<?php

namespace App\Forms\Builders;

use App\Enums\GenderTypes;
use App\Individual;
use LaravelEnso\FormBuilder\app\Classes\Form;

class IndividualForm
{
    private const TemplatePath = __DIR__.'/../Templates/individual.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
    }

    public function create()
    {
        return $this->form->options('gender', GenderTypes::select())
                ->create();
    }

    public function edit(Individual $individual)
    {
        return $this->form->options('gender', GenderTypes::select())
            ->append('gender', $individual->gender)
            ->append('individual_id', $individual->id)
            ->edit($individual);
    }
}
