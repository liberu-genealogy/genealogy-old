<?php

namespace App\Forms\Builders;

use App\Models\Note;
use App\Models\Type;
use LaravelEnso\Forms\Services\Form;

class NoteForm
{
    protected const TemplatePath = __DIR__.'/../Templates/notes.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form
    ->options('type_id', Type::all())
    ->create();
    }

    public function edit(Note $note)
    {
        return $this->form
    ->options('type_id', Type::all())
    ->edit($note);
    }
}
