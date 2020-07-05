<?php

namespace App\Http\Controllers\enso\Localisation\Language;

use App\Forms\Builders\enso\Localisation\LanguageForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(LanguageForm $form)
    {
        return ['form' => $form->create()];
    }
}
