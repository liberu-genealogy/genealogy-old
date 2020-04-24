<?php

namespace App\Http\Controllers\Authors;

use App\Author;
use App\Http\Requests\ValidateAuthorRequest;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateAuthorRequest $request, Author $author)
    {
        $author->fill($request->validated())->save();

        return [
            'message' => __('The author was successfully created'),
            'redirect' => 'authors.edit',
            'param' => ['author' => $author->id],
        ];
    }
}
