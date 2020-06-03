<?php

namespace App\Http\Controllers\GedcomImport;

use App\Note;
use App\Event;
use App\Family;
use App\Person;
use App\Source;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GedcomImportController extends Controller
{
    /*
    * Api end-point for Gedcom api/gedcom/store
    * Saving uploaded file to storage and starting to read
    */

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $request->file->storeAs('gedcom', 'file.ged');
                $this->readData($request->file);

                return ['File uploaded'];
            }

            return ['File corrupted'];
        }

        return ['Not uploaded'];
    }

    /*
    * Read ged file
    */

    public function readData($filename)
    {
	use Asdfx\LaravelGedcom\Facades\GedcomParserFacade;
	$filename = $this->filename;
	GedcomParserFacade::parse($filename, true);
    }

}
