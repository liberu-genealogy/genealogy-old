<?php

namespace App\Http\Controllers\Chan;

use App\Forms\Builders\ChanForm;
use App\Models\Chan;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Chan $chan, ChanForm $form)
    {
        return ['form' => $form->edit($chan)];
    }
}
