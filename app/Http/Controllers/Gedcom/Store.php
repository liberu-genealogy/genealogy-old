<?php

namespace App\Http\Controllers\Gedcom;

use App\Http\Controllers\Controller;
use App\Jobs\ImportGedcom;
use App\Tenant\Manager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class Store extends Controller
{
    public function __invoke(Request $request): Response
    {
        [$slug, $file] = $request->validate([
            'slug' => 'required|string',
            'file' => 'required|mimes:application/octet-stream',
        ]);

        $manager = Manager::fromModel($request->user()->company() ?? $request->user());

        $path = $manager->getStorage()->putFileAs('imports', $file, null);

        ImportGedcom::dispatch($request->user(), $manager->storagePath($path), $slug);

        return response([
            'message' => 'Gedcom Import Dispatched',
        ]);
    }
}
