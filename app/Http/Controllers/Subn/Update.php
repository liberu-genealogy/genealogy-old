<?php

namespace App\Http\Controllers\Subn;

use App\Subn;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateSubnRequest;

class Update extends Controller
{
    public function __invoke(ValidateSubnRequest $request, Subn $subn)
    {
        $subn->update($request->validated());

        return ['message' => __('The subn was successfully updated')];
    }
}
