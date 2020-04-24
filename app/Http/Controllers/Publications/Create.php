<?php

namespace App\Http\Controllers\Publications;

use Illuminate\Routing\Controller;
use App\Forms\Builders\PublicationForm;

class Create extends Controller
{
    public function __invoke(PublicationForm $form)
    {
        return ['form' => $form->create()];
    }
}
