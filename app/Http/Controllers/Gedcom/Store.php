<?php

namespace App\Http\Controllers\Gedcom;

use App\Event;
use App\Family;
use App\Http\Controllers\Controller;
use App\Note;
use App\Person;
use App\Source;
use Asdfx\LaravelGedcom\Facades\GedcomParserFacade;
use Illuminate\Http\Request;

class Store extends Controller
{
    /*
    * Api end-point for Gedcom api/gedcom/store
    * Saving uploaded file to storage and starting to read
    */

    public function __invoke(Request $request)
    {
        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $request->file->storeAs('gedcom', 'file.ged');
                GedcomParserFacade::parse($request->file('file'), true);

                return ['File uploaded'];
            }

            return ['File corrupted'];
        }

        return ['Not uploaded'];
    }
}
