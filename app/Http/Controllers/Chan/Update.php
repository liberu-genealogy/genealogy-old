<?php

namespace App\Http\Controllers\Chan;

use App\Chan;
use App\Http\Requests\ValidateChanRequest;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateChanRequest $request, Chan $chan)
    {
        $chan->update($request->validated());

        return ['message' => __('The chan was successfully updated')];
    }
}
