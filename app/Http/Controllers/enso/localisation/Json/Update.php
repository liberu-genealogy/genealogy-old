<?php

namespace App\Http\Controllers\enso\Localisation\Json;

use Illuminate\Http\Request;
use App\Models\enso\Localisation\Language;
use App\Service\enso\Localisation\Json\Updater;

class Update
{
    public function __invoke(Request $request, Language $language, string $subDir)
    {
        (new Updater(
            $language, $request->get('langFile'), $subDir
        ))->run();

        return ['message' => __('The language files were successfully updated')];
    }
}
