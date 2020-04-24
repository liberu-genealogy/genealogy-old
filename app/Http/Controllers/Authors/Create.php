<?php

namespace App\Http\Controllers\Authors;

use App\Forms\Builders\AuthorForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(AuthorForm $form)
    {
        return ['form' => $form->create()];
    }
}
