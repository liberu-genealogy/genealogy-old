<?php

namespace App\Http\Controllers\Notes;

use App\Forms\Builders\NoteForm;
use App\Note;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Note $note, NoteForm $form)
    {
        return ['form' => $form->edit($note)];
    }
}
