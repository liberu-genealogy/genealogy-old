<?php

namespace App\Http\Controllers\Topic;

use App\Models\Topic;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Topic $category)
    {
        $category->delete();

        return [
            'message' => __('The topic was successfully deleted'),
            'redirect' => 'social.topics.index',
        ];
    }
}
