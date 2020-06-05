<?php
namespace App\Http\Controllers\Gedcom;

use App\Event;
use App\Family;
use App\Http\Controllers\Controller;
use App\Note;
use App\Person;
use App\Source;
use Asdfx\LaravelGedcom\Facades\GedcomParserFacade;
use Asdfx\LaravelGedcom\Utils\GedcomParser;
use Illuminate\Http\Request;

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
                try{
                    $request->file->storeAs('gedcom', 'file.ged');
		    define('STDIN',fopen("php://stdin","r"));
                    $parser = new GedcomParser();
                    $parser->parse($request->file('file'), $slug, true);
                    return ['File uploaded'];
                }catch(Exception $e){
                    return ['Not uploaded'];
                }
            }

            return ['File corrupted'];
        }
        
        return ['Not uploaded'];
    }
}
