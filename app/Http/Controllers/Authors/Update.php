<?php

namespace App\Http\Controllers\Authors;

use App\Author;
use App\Http\Requests\ValidateAuthorRequest;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateAuthorRequest $request, Author $author)
    {
        $author->update($request->validated());

        return ['message' => __('The author was successfully updated')];
    }
}
