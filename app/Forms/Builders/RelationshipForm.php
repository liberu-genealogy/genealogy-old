<?php

namespace App\Forms\Builders;

use App\Relationship;
use LaravelEnso\FormBuilder\app\Classes\Form;

class RelationshipForm
{
    private const TemplatePath = __DIR__.'/../Templates/relationship.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Relationship $relationship)
    {
        return $this->form->edit($relationship);
    }
}
