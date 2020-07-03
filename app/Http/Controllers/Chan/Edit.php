<?php

namespace App\Http\Controllers\Chan;

use App\Chan;
use App\Forms\Builders\ChanForm;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Chan $chan, ChanForm $form)
    {
        return ['form' => $form->edit($chan)];
    }
}
