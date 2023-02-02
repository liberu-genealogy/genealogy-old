<?php

namespace App\Http\Controllers\DnaMatching;

use App\Models\DnaMatching;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(DnaMatching $dnamatching)
    {
        error_log('message here.in show.php');
        error_log(" --------here is show.php------------->", 3, base_path().'/log/log.log');

        return ['dnamatching' => $dnamatching];
    }
}
