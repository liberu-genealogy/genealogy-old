<?php

namespace App\Http\Controllers\Repository;

use App\repository;
use Illuminate\Routing\Controller;
use App\Forms\Builders\repositoryForm;

class Edit extends Controller
{
    public function __invoke(repository $repository, repositoryForm $form)
    {
        return ['form' => $form->edit($repository)];
    }
}
