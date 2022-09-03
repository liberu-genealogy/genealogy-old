<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\ValidatePostRequest;
use App\Models\Topic;
use Illuminate\Routing\Controller;
use LaravelEnso\Discussions\Models\Discussion;

class Store extends Controller
{
    public function __invoke(ValidatePostRequest $request, Topic $topic, Discussion $discussion)
    {
        $discussion->fill($request->validated());
        $discussion->discussable_id = $topic->id;
        $discussion->discussable_type = Topic::class;
        $discussion->save();

        return [
            'message' => __('The post was successfully created'),
            'redirect' => 'social.posts.edit',
            'param' => ['category' => $discussion->id],
        ];
    }
}
