<?php

namespace App\Http\Controllers\Authors;

use App\Models\Author;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Author $author)
    {
        return ['author' => $author];
    }
}
