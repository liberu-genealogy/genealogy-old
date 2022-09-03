<?php

namespace App\Http\Controllers\Category;

use App\Http\Requests\ValidateCategoryRequest;
use App\Models\Category;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class Store extends Controller
{
    public function __invoke(ValidateCategoryRequest $request, Category $category)
    {
        $category->fill($request->validated());
        $category->user_id = Auth::id();
        $category->save();

        return [
            'message' => __('The category was successfully created'),
            'redirect' => 'social.categories.edit',
            'param' => ['category' => $category->id],
        ];
    }
}
