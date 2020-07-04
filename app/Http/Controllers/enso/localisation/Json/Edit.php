<?php

namespace App\Http\Controllers\enso\Localisation\Json;

use App\Models\enso\Localisation\Language;
use App\Service\enso\Localisation\Json\Reader;

class Edit
{
    public function __invoke(Language $language, string $subDir)
    {
        return (new Reader($language, $subDir))->get();
    }
}
