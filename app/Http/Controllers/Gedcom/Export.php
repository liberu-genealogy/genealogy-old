<?php

namespace App\Http\Controllers\Gedcom;

use App\Http\Controllers\Controller;
use App\Jobs\ExportGedCom;
use FamilyTree365\LaravelGedcom\Utils\GedcomGenerator;
use FamilyTree365\LaravelGedcom\Utils\GedcomParser;
use FamilyTree365\LaravelGedcom\Utils\GedcomWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Export extends Controller
{
    public function __invoke(Request $request)
    {
        $ts = microtime(true);
        $file = env('APP_NAME').date('_Ymd_').$ts.'.ged';
        $file = str_replace(' ', '', $file);
        $file = str_replace("'", '', $file);

        //TODO need data for testing
        $conn = 'tenant';
        $p_id = 1;
        $f_id = 1;
        $up_nest = 0;
        $down_nest = 0;
        $_name = uniqid().'.ged';

        $writer = new GedcomGenerator($p_id, $f_id, $up_nest, $down_nest);
        $content = $writer->getGedcomPerson();

        ExportGedCom::dispatch($file);
        $path = Storage::path($file);

        return json_encode([
            'file' => \Storage::disk('public')->get($file),
            'name' => $file,
        ]);
    }
}
