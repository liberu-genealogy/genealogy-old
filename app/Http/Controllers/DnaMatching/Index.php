<?php

namespace App\Http\Controllers\DnaMatching;

use App\Http\Controllers\Controller;
use App\Models\DnaMatching;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function __invoke(Request $request, DnaMatching $dnamatching)
    {
        return ['dnamatchings' => $dnamatching];
    }
}
