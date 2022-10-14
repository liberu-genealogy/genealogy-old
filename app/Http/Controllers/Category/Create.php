<?php

namespace App\Http\Controllers\Category;

use App\Forms\Builders\CategoryForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(CategoryForm $form)
    {
        return ['form' => $form->create()];
    }
}
