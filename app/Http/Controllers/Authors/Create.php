<?php

namespace App\Http\Controllers\Authors;

use Illuminate\Routing\Controller;
use App\Forms\Builders\AuthorForm;

class Create extends Controller
{
    public function __invoke(AuthorForm $form)
    {
        return ['form' => $form->create()];
    }
}
