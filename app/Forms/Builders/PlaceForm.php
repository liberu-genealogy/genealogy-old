<?php

namespace App\Forms\Builders;

use App\Place;
use LaravelEnso\FormBuilder\app\Classes\Form;

class PlaceForm
{
    private const TemplatePath = __DIR__.'/../Templates/place.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Place $place)
    {
        return $this->form->edit($place);
    }
}
