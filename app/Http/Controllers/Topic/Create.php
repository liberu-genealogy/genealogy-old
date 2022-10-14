<?php

namespace App\Http\Controllers\Topic;

use App\Forms\Builders\TopicForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(TopicForm $form)
    {
        return ['form' => $form->create()];
    }
}
