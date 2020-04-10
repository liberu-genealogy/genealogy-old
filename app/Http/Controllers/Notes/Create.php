<?php

namespace App\Http\Controllers\Notes;

use Illuminate\Routing\Controller;
use App\Forms\Builders\NoteForm;

class Create extends Controller
{
    public function __invoke(NoteForm $form)
    {
        return ['form' => $form->create()];
    }
}
