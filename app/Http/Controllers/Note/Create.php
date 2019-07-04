<?php

namespace App\Http\Controllers\Note;

use App\Forms\Builders\noteForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(noteForm $form)
    {
        return ['form' => $form->create()];
    }
}
