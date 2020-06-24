<?php

namespace App\Http\Controllers\Gedcom;

use App\Event;
use App\Family;
use App\Http\Controllers\Controller;
use App\Note;
use App\Person;
use App\Source;
use Illuminate\Http\Request;
use ModularSoftware\LaravelGedcom\Facades\GedcomParserFacade;
use ModularSoftware\LaravelGedcom\Utils\GedcomParser;
use App\Jobs\ImportGedcom;
use Auth;
class Store extends Controller
{
    /*
    * Api end-point for Gedcom api/gedcom/store
    * Saving uploaded file to storage and starting to read
    */

    public function __invoke(Request $request)
    {
        $slug = $request->get('slug');
        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                try {
                    $currentUser = Auth::user();
                    $_name = uniqid().".ged";
                    $request->file->storeAs('gedcom', $_name);
                    define('STDIN', fopen('php://stdin', 'r'));
                    // $parser = new GedcomParser();
                    // $parser->parse($request->file('file'), $slug, true);
                    $filename = 'app/gedcom/'.$_name;
                    ImportGedcom::dispatch($filename, $slug, $currentUser->id);
                    return ['File uploaded'];
                } catch (Exception $e) {
                    return ['Not uploaded'];
                }
            }
            return ['File corrupted'];
        }

        return ['Not uploaded'];
    }
}
