<?php

namespace App\Http\Controllers\Post;

use App\Forms\Builders\PostForm;
use App\Models\Topic;
use Illuminate\Routing\Controller;
use LaravelEnso\Discussions\Models\Discussion;

class Edit extends Controller
{
    public function __invoke(Topic $topic, Discussion $post, PostForm $form)
    {
        return ['form' => $form->edit($post)];
    }
}
