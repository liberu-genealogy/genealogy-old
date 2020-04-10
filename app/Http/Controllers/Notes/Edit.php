<?php

namespace App\Http\Controllers\Notes;

use App\Note;
use Illuminate\Routing\Controller;
use App\Forms\Builders\NoteForm;

class Edit extends Controller
{
    public function __invoke(Note $note, NoteForm $form)
    {
        return ['form' => $form->edit($note)];
    }
}
