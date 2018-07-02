<?php

namespace App\Http\Controllers\Note;

use App\Note;
use App\Forms\Builders\NoteForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateNoteRequest;

class NoteController extends Controller
{
    public function create(NoteForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateNoteRequest $request)
    {
        $note = new Note($request->all());

        $note->save();

        return [
            'message' => __('The Note was successfully created'),
            'redirect' => 'notes.edit',
            'id' => $note->id,
        ];
    }

    public function show(Note $note)
    {
        return ['Note' => $note];
    }

    public function edit(Note $note, NoteForm $form)
    {
        return ['form' => $form->edit($note)];
    }

    public function update(ValidateNoteRequest $request, Note $note)
    {
        $note->fill($request->all());

        $note->save();

        return ['message' => __('The Note was successfully updated')];
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return [
            'message' => __('The Note was successfully deleted'),
            'redirect' => 'notes.index',
        ];
    }
}
