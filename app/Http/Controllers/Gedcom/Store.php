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


         $request->validate([
            'slug' => 'required|string',
            'file' => 'required|mimes:ged,txt'
        ]);
        $slug = $request->slug;
        $file = $request->file;

        $manager = Manager::fromModel($request->user()->company() ?? $request->user());

        // $path = $manager->getStorage()->putFileAs('imports', $file, null);
        $path = $manager->storage()->putFileAs('imports',$file, time()."."."ged");
        ImportGedcom::dispatch($request->user(), $manager->storagePath($path), $slug);

        return response([
            'message' => 'Gedcom Import Dispatched',
        ]);
    }
}
