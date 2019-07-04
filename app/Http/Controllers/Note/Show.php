<?php

namespace App\Http\Controllers\Note;

use App\note;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(note $note)
    {
        return ['note' => $note];
    }
}
