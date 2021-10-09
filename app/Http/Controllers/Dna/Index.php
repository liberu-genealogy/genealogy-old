<?php

namespace App\Http\Controllers\Dna;

use App\Http\Controllers\Controller;
use App\Models\Dna;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function __invoke(Request $request, Dna $dna)
    {
        return ['dnas' => $dna];
    }
}
