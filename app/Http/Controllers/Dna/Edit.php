<?php

namespace App\Http\Controllers\Dna;

use App\Forms\Builders\DnaForm;
use App\Models\Dna;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Dna $dna, DnaForm $form)
    {
        $role = \Auth::user()->role_id;
        $user_id = \Auth::user()->id;
        if (in_array($role, [1, 2]) || $user_id == $dna->user_id) {
            return ['form' => $form->edit($dna)];
        }
    }
}
