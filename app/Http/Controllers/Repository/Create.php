<?php

namespace App\Http\Controllers\Repository;

use Illuminate\Routing\Controller;
use App\Forms\Builders\repositoryForm;

class Create extends Controller
{
    public function __invoke(repositoryForm $form)
    {
        return ['form' => $form->create()];
    }
}
