<?php

namespace App\Http\Controllers\Publications;

use App\Publication;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatePublicationRequest;

class Update extends Controller
{
    public function __invoke(ValidatePublicationRequest $request, Publication $publication)
    {
        $publication->update($request->validated());

        return ['message' => __('The publication was successfully updated')];
    }
}
