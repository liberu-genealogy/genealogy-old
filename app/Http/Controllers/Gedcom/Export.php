<?php

namespace App\Http\Controllers\Gedcom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\ExportGedCom;
use FamilyTree365\LaravelGedcom\Utils\GedcomGenerator;
use FamilyTree365\LaravelGedcom\Utils\GedcomParser;
use FamilyTree365\LaravelGedcom\Utils\GedcomWriter;

class Export extends Controller
{
    public function __invoke(Request $request)
    {
        $ts = microtime(true);
        $file = env('APP_NAME').date('_Ymd_').$ts.'.ged';
        $file = str_replace(' ', '', $file);
        $file = str_replace("'", '', $file);
        $url = url('/').'/upload/'.$file;

        //TODO need data for testing
        $conn = 'tenant';
        $p_id = 1;
        $f_id = 1;
        $up_nest = 0;
        $down_nest = 0;
        $_name = uniqid() . '.ged';

//        $parser = new GedcomWriter();
        // $parser->parse($request->file('file'), $slug, true);
        ray("hello world");
        
        $writer = new GedcomGenerator($p_id, $f_id, $up_nest, $down_nest);
//        $content = $parser->parse($_name, '', true);
//        dd($content);
        $content = $writer->getGedcomPerson();
        ExportGedCom::dispatch($request,$file);

        sleep(5);
//        $file = uniqid() . '.ged';
//        $path = public_path($file);
//        file_put_contents($path, '');

        return response()->json([
            'file' => url($url)
        ]);

    }
}
