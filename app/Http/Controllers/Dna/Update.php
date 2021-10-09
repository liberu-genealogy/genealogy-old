<?php

namespace App\Http\Controllers\Dna;

use App\Http\Requests\ValidateAddrRequest;
use App\Models\Dna;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateAddrRequest $request, Dna $dna)
    {
        $dna->update($request->validated());

        return ['message' => __('The DNA was successfully updated')];
    }
}
