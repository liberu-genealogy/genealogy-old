<?php

namespace App\Http\Controllers\Note;

use App\note;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatenoteRequest;

class Update extends Controller
{
    public function __invoke(ValidatenoteRequest $request, note $note)
    {
        $note->update($request->validated());

        return ['message' => __('The note was successfully updated')];
    }
}
