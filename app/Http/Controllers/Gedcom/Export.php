<?php

namespace App\Http\Controllers\Gedcom;

use App\Http\Controllers\Controller;
use App\Jobs\ExportGedCom;
use FamilyTree365\LaravelGedcom\Utils\GedcomGenerator;
use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\Log;
use App\Models\Family;

class Export extends Controller
{
    public function __invoke(Request $request)
    {
        $ts = microtime(true);
        $file = env('APP_NAME').date('_Ymd_').$ts.'.ged';
        $file = str_replace(' ', '', $file);
        $file = str_replace("'", '', $file);
        $_name = uniqid().'.ged';

        ExportGedCom::dispatch($file, $request->user());

        Log::info("Read gedfile from ". \Storage::disk("public")->path($file));
        // var_dump(\Storage::disk("public")->path($file), "controller");
        return json_encode([
            'file' => \Storage::disk('public')->get($file),
            'name' => $file,
        ]);
    }
}
