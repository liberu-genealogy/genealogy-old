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
        $note = Note::create($request->all());

        return [
            'message' => __('The note was successfully created'),
            'redirect' => 'note.edit',
            'param' => ['note' => $note->id],
        ];
    }

    public function show(Note $note)
    {
        return ['note' => $note];
    }

    public function edit(Note $note, NoteForm $form)
    {
        return ['form' => $form->edit($note)];
    }

    public function update(ValidateNoteRequest $request, Note $note)
    {
        $note->update($request->all());

        return ['message' => __('The note was successfully updated')];
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return [
            'message' => __('The note was successfully deleted'),
            'redirect' => 'note.index',
        ];
    }
}
