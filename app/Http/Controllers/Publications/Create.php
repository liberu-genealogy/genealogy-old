<?php

namespace App\Http\Controllers\Publications;

use App\Forms\Builders\PublicationForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(PublicationForm $form)
    {
        return ['form' => $form->create()];
    }
}
