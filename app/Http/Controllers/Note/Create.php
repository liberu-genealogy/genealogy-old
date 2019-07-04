<?php

namespace App\Http\Controllers\Note;

use Illuminate\Routing\Controller;
use App\Forms\Builders\noteForm;

class Create extends Controller
{
    public function __invoke(noteForm $form)
    {
        return ['form' => $form->create()];
    }
}
