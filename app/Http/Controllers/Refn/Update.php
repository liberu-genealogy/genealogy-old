<?php

namespace App\Http\Controllers\Refn;

use App\Http\Requests\ValidateRefnRequest;
use App\Models\Refn;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateRefnRequest $request, Refn $refn)
    {
        $refn->update($request->validated());

        return ['message' => __('The refn was successfully updated')];
    }
}
