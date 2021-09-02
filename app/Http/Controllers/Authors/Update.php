<?php

namespace App\Http\Controllers\Authors;

use App\Http\Requests\ValidateAuthorRequest;
use App\Models\Author;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateAuthorRequest $request, Author $author)
    {
        $author->update($request->validated());

        return ['message' => __('The author was successfully updated')];
    }
}
