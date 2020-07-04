<?php

namespace App\Http\Controllers\enso\Localisation\Json;

use LaravelEnso\Localisation\Services\Json\Merger;

class Merge
{
    public function __invoke($locale = null)
    {
        (new Merger())->run($locale);

        return ['message' => __('The language files were successfully merged')];
    }
}
