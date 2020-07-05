<?php

namespace App\Http\Controllers\enso\files\File;

use App\Models\enso\files\File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

class Link extends Controller
{
    use AuthorizesRequests;

    public function __invoke(File $file)
    {
        $this->authorize('share', $file);

        return ['link' => $file->attachable->temporaryLink()];
    }
}
