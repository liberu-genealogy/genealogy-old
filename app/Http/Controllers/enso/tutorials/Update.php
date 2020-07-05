<?php

namespace App\Http\Controllers\enso\Tutorials;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\Http\Requests\ValidateTutorialRequest;
use App\Models\enso\Tutorials\Tutorial;

class Update extends Controller
{
    public function __invoke(ValidateTutorialRequest $request, Tutorial $tutorial)
    {
        $tutorial->update($request->validated());

        return ['message' => __('The tutorial was successfully updated')];
    }
}
