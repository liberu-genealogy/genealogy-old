<?php

namespace App\Http\Controllers\enso\Localisation\Language;

use Illuminate\Routing\Controller;
use App\Forms\Builders\enso\Localisation\LanguageForm;

class Create extends Controller
{
    public function __invoke(LanguageForm $form)
    {
        return ['form' => $form->create()];
    }
}
