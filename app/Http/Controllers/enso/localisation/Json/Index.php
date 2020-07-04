<?php

namespace App\Http\Controllers\enso\Localisation\Json;

use App\Models\enso\Localisation\Language;

class Index
{
    public function __invoke()
    {
        return Language::extra()->get()->map(fn ($locale) => [
            'id' => $locale->id,
            'name' => $locale->display_name,
        ]);
    }
}
