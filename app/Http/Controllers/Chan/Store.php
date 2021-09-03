<?php

namespace App\Http\Controllers\Chan;

use App\Http\Requests\ValidateChanRequest;
use App\Models\Chan;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateChanRequest $request, Chan $chan)
    {
        $chan->fill($request->validated())->save();

        return [
            'message' => __('The chan was successfully created'),
            'redirect' => 'chan.edit',
            'param' => ['chan' => $chan->id],
        ];
    }
}
