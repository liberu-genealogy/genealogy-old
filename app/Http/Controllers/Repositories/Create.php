<?php

namespace App\Http\Controllers\Repositories;

use Illuminate\Routing\Controller;
use App\Forms\Builders\RepositoryForm;

class Create extends Controller
{
    public function __invoke(RepositoryForm $form)
    {
        return ['form' => $form->create()];
    }
}
