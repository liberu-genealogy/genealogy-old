<?php

namespace App\Http\Controllers\Authors;

use App\Models\Author;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Author $author)
    {
        $author->delete();

        return [
            'message' => __('The author was successfully deleted'),
            'redirect' => 'authors.index',
        ];
    }
}
