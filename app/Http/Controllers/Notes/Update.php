<?php

namespace App\Http\Controllers\Notes;

use App\Http\Requests\ValidateNoteRequest;
use App\Models\Note;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateNoteRequest $request, Note $note)
    {
        $note->update($request->validated());

        return ['message' => __('The note was successfully updated')];
    }
}
