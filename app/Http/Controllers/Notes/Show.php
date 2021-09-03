<?php

namespace App\Http\Controllers\Notes;

use App\Models\Note;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Note $note)
    {
        return ['note' => $note];
    }
}
