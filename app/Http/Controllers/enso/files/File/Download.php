<?php

namespace App\Http\Controllers\enso\files\File;

use App\Models\enso\files\File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

class Download extends Controller
{
    use AuthorizesRequests;

    public function __invoke(File $file)
    {
        $this->authorize('view', $file);

        return $file->attachable->download();
    }
}
