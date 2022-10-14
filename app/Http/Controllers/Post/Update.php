<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\ValidatePostRequest;
use App\Models\Topic;
use Illuminate\Routing\Controller;
use LaravelEnso\Discussions\Models\Discussion;

class Update extends Controller
{
    public function __invoke(ValidatePostRequest $request, Topic $topic, Discussion $post)
    {
        $post->update($request->validated());

        return ['message' => __('The post was successfully updated')];
    }
}
