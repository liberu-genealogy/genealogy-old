<?php

namespace App\Http\Controllers\Subn;

use App\Http\Requests\ValidateSubnRequest;
use App\Subn;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateSubnRequest $request, Subn $subn)
    {
        $subn->update($request->validated());

        return ['message' => __('The subn was successfully updated')];
    }
}
