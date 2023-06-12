<?php

namespace App\Http\Controllers\Gedcom;

use App\Http\Controllers\Controller;
use App\Jobs\ExportGedCom;
use FamilyTree365\LaravelGedcom\Utils\GedcomGenerator;
use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\Log;
use App\Models\Family;
use App\Tenant\Manager;
use Illuminate\Support\Facades\File;
class Export extends Controller
{
    public function __invoke(Request $request)
    {
        $ts = microtime(true);
        $file = env('APP_NAME').date('_Ymd_').$ts.'.ged';
        $file = str_replace(' ', '', $file);
        $file = str_replace("'", '', $file);
        $filePath = 'public/' . $file;
        $manager = Manager::fromModel($request->user()->company(), $request->user());
        ExportGedCom::dispatch($filePath, $request->user());

        Log::info("Read gedfile from ". \Storage::disk("public")->path($filePath));
        // var_dump($filePath);
        return json_encode([
            'file' => $manager->storage()->get($filePath),
            'name' => $file,
        ], JSON_THROW_ON_ERROR);
    }
}
