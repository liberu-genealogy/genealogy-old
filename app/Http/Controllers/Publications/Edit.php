<?php

namespace App\Http\Controllers\Publications;

use App\Forms\Builders\PublicationForm;
use App\Models\Publication;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Publication $publication, PublicationForm $form)
    {
        return ['form' => $form->edit($publication)];
    }
}
