<?php namespace App\Http\Controllers\Gedcom;

use App\Jobs\ImportGedcom;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class Store extends Controller
{
    public function __invoke(Request $request): Response
    {
        [$slug, $file] = $request->validate([
            'slug' => 'required|string',
            'file' => 'required|mimes:application/octet-stream'
        ]);

        ImportGedcom::dispatch($request->user(), $file->storeAs('gedcom', uniqid().'.ged'), $slug);

        return response([
            'message' => 'Gedcom Import Dispatched'
        ]);
    }
}
