<?php

namespace App\Http\Controllers\enso\Localisation\Language;

use App\Service\enso\Localisation\Storer;
use Illuminate\Routing\Controller;
use LaravelEnso\Localisation\Http\Requests\ValidateLanguageRequest;

class Store extends Controller
{
    public function __invoke(ValidateLanguageRequest $request)
    {
        $language = (new Storer(
            $request->validatedExcept('flag_sufix'),
            $request->get('flag_sufix')
        ))->create();

        return [
            'message' => __('The language was successfully created'),
            'redirect' => 'system.localisation.edit',
            'param' => ['language' => $language->id],
        ];
    }
}
