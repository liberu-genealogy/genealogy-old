<?php

namespace App\Http\Controllers\Post;

use App\Models\Topic;
use Illuminate\Routing\Controller;
use LaravelEnso\Discussions\Models\Discussion;

class Destroy extends Controller
{
    public function __invoke(Topic $topic, Discussion $discussion)
    {
        $discussion->delete();

        return [
            'message' => __('The post was successfully deleted'),
            'redirect' => 'social.post.index',
        ];
    }
}
