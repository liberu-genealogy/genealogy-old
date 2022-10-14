<?php

namespace App\Http\Controllers\Topic;

use App\Http\Requests\ValidateTopicRequest;
use App\Models\Topic;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class Store extends Controller
{
    public function __invoke(ValidateTopicRequest $request, Topic $topic)
    {
        $topic->fill($request->validated());
        $topic->user_id = Auth::id();
        $topic->save();

        return [
            'message' => __('The topic was successfully created'),
            'redirect' => 'social.topics.edit',
            'param' => ['topic' => $topic->id],
        ];
    }
}
