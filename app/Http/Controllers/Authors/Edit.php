<?php

namespace App\Http\Controllers\Authors;

use App\Forms\Builders\AuthorForm;
use App\Models\Author;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Author $author, AuthorForm $form)
    {
        return ['form' => $form->edit($author)];
    }
}
