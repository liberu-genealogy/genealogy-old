<?php

namespace App\Http\Controllers\Publications;

use App\Http\Requests\ValidatePublicationRequest;
use App\Models\Publication;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidatePublicationRequest $request, Publication $publication)
    {
        $publication->update($request->validated());

        return ['message' => __('The publication was successfully updated')];
    }
}
