<?php

namespace App\Http\Controllers\Note;

use App\note;
use App\Forms\Builders\noteForm;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(note $note, noteForm $form)
    {
        return ['form' => $form->edit($note)];
    }
}
