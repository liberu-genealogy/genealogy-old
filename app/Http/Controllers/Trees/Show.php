<?php

namespace App\Http\Controllers\Trees;

use App\Note;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Note $note)
    {
        return ['tree' => $note];
    }
}
