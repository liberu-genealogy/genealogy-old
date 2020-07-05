<?php

namespace App\Http\Controllers\enso\files\File;

use App\Models\enso\files\File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    use AuthorizesRequests;

    public function __invoke(File $file)
    {
        $this->authorize('destroy', $file);

        $file->attachable->delete();
    }
}
