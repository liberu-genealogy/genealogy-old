<?php

namespace App\Http\Controllers\Authors;

use App\Author;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateAuthorRequest;

class Update extends Controller
{
    public function __invoke(ValidateAuthorRequest $request, Author $author)
    {
        $author->update($request->validated());

        return ['message' => __('The author was successfully updated')];
    }
}
