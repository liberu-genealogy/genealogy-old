<?php

namespace App\Http\Controllers\Notes;

use App\Note;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateNoteRequest;

class Store extends Controller
{
    public function __invoke(ValidateNoteRequest $request, Note $note)
    {
        $note->fill($request->validated())->save();

        return [
            'message' => __('The note was successfully created'),
            'redirect' => 'notes.edit',
            'param' => ['note' => $note->id],
        ];
    }
}
