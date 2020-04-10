<?php

namespace App\Http\Controllers\Notes;

use App\Note;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateNoteRequest;

class Update extends Controller
{
    public function __invoke(ValidateNoteRequest $request, Note $note)
    {
        $note->update($request->validated());

        return ['message' => __('The note was successfully updated')];
    }
}
