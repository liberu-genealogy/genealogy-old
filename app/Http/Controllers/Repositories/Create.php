<?php

namespace App\Http\Controllers\Repositories;

use App\Forms\Builders\RepositoryForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(RepositoryForm $form)
    {
        return ['form' => $form->create()];
    }
}
