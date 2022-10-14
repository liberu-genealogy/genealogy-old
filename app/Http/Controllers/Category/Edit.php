<?php

namespace App\Http\Controllers\Category;

use App\Forms\Builders\CategoryForm;
use App\Models\Category;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Category $category, CategoryForm $form)
    {
        return ['form' => $form->edit($category)];
    }
}
