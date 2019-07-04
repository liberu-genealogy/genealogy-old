<?php

namespace App\Http\Controllers\Note;

use App\note;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(note $note)
    {
        $note->delete();

        return [
            'message' => __('The note was successfully deleted'),
            'redirect' => 'note.index',
        ];
    }
}
