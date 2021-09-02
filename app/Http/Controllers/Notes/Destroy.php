<?php

namespace App\Http\Controllers\Notes;

use App\Models\Note;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Note $note)
    {
        $note->delete();

        return [
            'message' => __('The note was successfully deleted'),
            'redirect' => 'notes.index',
        ];
    }
}
