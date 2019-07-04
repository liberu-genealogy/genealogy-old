<?php

namespace App\Http\Controllers\Note;

use App\note;
use Illuminate\Routing\Controller;
use App\Forms\Builders\noteForm;

class Edit extends Controller
{
    public function __invoke(note $note, noteForm $form)
    {
        return ['form' => $form->edit($note)];
    }
}
