<?php

namespace App\Http\Controllers\enso\files\File;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use App\Models\enso\files\File;

class Download extends Controller
{
    use AuthorizesRequests;

    public function __invoke(File $file)
    {
        $this->authorize('view', $file);

        return $file->attachable->download();
    }
}
