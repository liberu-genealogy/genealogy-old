<?php

namespace App\Http\Controllers\Repositories;

use App\Forms\Builders\RepositoryForm;
use App\Repository;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Repository $repository, RepositoryForm $form)
    {
        return ['form' => $form->edit($repository)];
    }
}
