<?php

namespace App\Http\Controllers\Publications;

use App\Publication;
use Illuminate\Routing\Controller;
use App\Forms\Builders\PublicationForm;

class Edit extends Controller
{
    public function __invoke(Publication $publication, PublicationForm $form)
    {
        return ['form' => $form->edit($publication)];
    }
}
