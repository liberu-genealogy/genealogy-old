<?php

namespace App\Http\Controllers\Note;

use App\note;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatenoteRequest;

class Store extends Controller
{
    public function __invoke(ValidatenoteRequest $request, note $note)
    {
        tap($note)->fill($request->validated())
            ->save();

        return [
            'message' => __('The note was successfully created'),
            'redirect' => 'note.edit',
            'param' => ['note' => $note->id],
        ];
    }
}
