<?php

namespace App\Forms\Builders;

use App\note;
use LaravelEnso\Forms\app\Services\Form;

class noteForm
{
    private const TemplatePath = __DIR__.'/../Templates/note.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(note $note)
    {
        return $this->form->edit($note);
    }
}
