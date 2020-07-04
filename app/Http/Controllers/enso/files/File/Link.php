<?php

namespace App\Http\Controllers\enso\files\File;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use App\Models\enso\files\File;

class Link extends Controller
{
    use AuthorizesRequests;

    public function __invoke(File $file)
    {
        $this->authorize('share', $file);

        return ['link' => $file->attachable->temporaryLink()];
    }
}
