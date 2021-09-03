<?php

namespace App\Http\Controllers\Publications;

use App\Http\Requests\ValidatePublicationRequest;
use App\Models\Publication;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidatePublicationRequest $request, Publication $publication)
    {
        $publication->fill($request->validated())->save();

        return [
            'message' => __('The publication was successfully created'),
            'redirect' => 'publications.edit',
            'param' => ['publication' => $publication->id],
        ];
    }
}
