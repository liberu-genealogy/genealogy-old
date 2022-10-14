<?php

namespace App\Http\Controllers\Category;

use App\Http\Requests\ValidateCategoryRequest;
use App\Models\Category;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return ['message' => __('The category was successfully updated')];
    }
}
