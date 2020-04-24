<?php

namespace App\Http\Controllers\Authors;

use App\Author;
use Illuminate\Routing\Controller;
use App\Forms\Builders\AuthorForm;

class Edit extends Controller
{
    public function __invoke(Author $author, AuthorForm $form)
    {
        return ['form' => $form->edit($author)];
    }
}
