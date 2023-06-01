<?php

namespace App\Http\Controllers\Gedcom;

use App\Http\Controllers\Controller;
use App\Jobs\ImportGedcom;
use App\Tenant\Manager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use LaravelEnso\Api\Models\Log;

class Store extends Controller
{
    public function __invoke(Request $request): Response
    {
        if ($request->file('file')->getClientOriginalExtension() != 'ged') {
            return response([
                'msg'=>'file type invalid',
            ], 422);
        }

        $request->validate([
            'slug' => 'required|string',
            'file' => 'required',
        ]);
        $slug = $request->slug;
        $file = $request->file('file');
        $manager = Manager::fromModel($request->user()->company(), $request->user());
        $path = $manager->storage()->putFile('imports', $file);

        ImportGedcom::dispatch($request->user(), $manager->storagePath($path), $slug);

        return response([
            'message' => 'Gedcom Import Dispatched',
        ]);
    }
}
