<?php

namespace App\Http\Controllers\enso\Localisation\Language;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelEnso\Localisation\Services\Destroyer;
use App\Models\enso\Localisation\Language;
class Destroy extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Language $language)
    {
        $this->authorize('destroy', $language);

        (new Destroyer($language))->run();

        return [
            'message' => __('The language was successfully deleted'),
            'redirect' => 'system.localisation.index',
        ];
    }
}
