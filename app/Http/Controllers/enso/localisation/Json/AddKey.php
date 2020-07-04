<?php

namespace App\Http\Controllers\enso\Localisation\Json;

use Illuminate\Support\Collection;
use LaravelEnso\Localisation\Http\Requests\ValidateKeyRequest;
use App\Models\enso\Localisation\Language;
use App\Service\enso\Localisation\Json\Updater;

class AddKey
{
    public function __invoke(ValidateKeyRequest $request, Language $language)
    {
        $keys = (new Collection($request->get('keys')))
            ->mapWithKeys(fn ($key) => [$key => null])
            ->toArray();

        (new Updater($language, $keys))->addKey();

        return ['message' => __('The translation key was successfully added')];
    }
}
