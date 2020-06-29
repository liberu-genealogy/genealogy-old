<?php

namespace App\Http\Controllers\Chan;

use App\Chan;
use Illuminate\Routing\Controller;
use App\Forms\Builders\ChanForm;

class Edit extends Controller
{
    public function __invoke(Chan $chan, ChanForm $form)
    {
        return ['form' => $form->edit($chan)];
    }
}
