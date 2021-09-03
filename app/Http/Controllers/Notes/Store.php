<?php

namespace App\Http\Controllers\Notes;

use App\Http\Requests\ValidateNoteRequest;
use App\Models\Note;
use Illuminate\Routing\Controller;

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
