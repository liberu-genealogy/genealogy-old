<?php

namespace App\Http\Controllers\Topic;

use App\Forms\Builders\TopicForm;
use App\Models\Topic;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Topic $topic, TopicForm $form)
    {
        return ['form' => $form->edit($topic)];
    }
}
