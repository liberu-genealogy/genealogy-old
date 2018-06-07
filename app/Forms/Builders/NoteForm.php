<?php

namespace App\Forms\Builders;

use App\Note;
use LaravelEnso\FormBuilder\app\Classes\Form;

class NoteForm
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

    public function edit(Note $note)
    {
        return $this->form->edit($note);
    }
}
