<?php

namespace App\Http\Controllers\Post;

use App\Forms\Builders\PostForm;
use App\Models\Topic;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(Topic $topic, PostForm $form)
    {
        return ['form' => $form->create()];
    }
}
