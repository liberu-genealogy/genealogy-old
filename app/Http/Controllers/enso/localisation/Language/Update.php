<?php

namespace App\Http\Controllers\enso\Localisation\Language;

use Illuminate\Routing\Controller;
use LaravelEnso\Localisation\Http\Requests\ValidateLanguageRequest;
use App\Service\enso\Localisation\Updater;
use App\Models\enso\Localisation\Language;

class Update extends Controller
{
    public function __invoke(ValidateLanguageRequest $request, Language $language)
    {
        (new Updater(
            $language,
            $request->validatedExcept('flag_sufix'),
            $request->get('flag_sufix')
        ))->run();

        return ['message' => __('The language was successfully updated')];
    }
}
