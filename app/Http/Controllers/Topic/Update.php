<?php

namespace App\Http\Controllers\Topic;

use App\Http\Requests\ValidateTopicRequest;
use App\Models\Topic;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateTopicRequest $request, Topic $topic)
    {
        $topic->update($request->validated());

        return ['message' => __('The topic was successfully updated')];
    }
}
