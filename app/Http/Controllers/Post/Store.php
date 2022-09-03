<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\ValidatePostRequest;
use App\Models\Topic;
use Illuminate\Routing\Controller;
use LaravelEnso\Discussions\Models\Discussion;

class Store extends Controller
{
    public function __invoke(ValidatePostRequest $request, Topic $topic, Discussion $post)
    {
        $post->fill($request->validated());
        $post->discussable_id = $topic->id;
        $post->discussable_type = Topic::class;
        $post->save();

        return [
            'message' => __('The post was successfully created'),
            'redirect' => 'social.posts.edit',
            'param' => ['topic' => $topic->id, 'post' => $post->id],
        ];
    }
}
