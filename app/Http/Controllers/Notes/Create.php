<?php

namespace App\Http\Controllers\Notes;

use App\Forms\Builders\NoteForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(NoteForm $form)
    {
        return ['form' => $form->create()];
    }
}
