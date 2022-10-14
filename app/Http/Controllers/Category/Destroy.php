<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Category $category)
    {
        $category->delete();

        return [
            'message' => __('The category was successfully deleted'),
            'redirect' => 'social.categories.index',
        ];
    }
}
