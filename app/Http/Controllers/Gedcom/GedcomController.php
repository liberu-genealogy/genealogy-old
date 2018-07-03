<?php

namespace App\Http\Controllers\Gedcom;

use App\Note;
use App\Event;
use App\Family;
use App\Gedcom;
use App\Individual;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GedcomController extends Controller
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
                $this->readData();

                return ['File uploaded'];
            }

            return ['File corrupted'];
        }

        return ['Not uploaded'];
    }

    /*
    * Read ged file
    */

    public function readData()
    {
        $parser = new \PhpGedcom\Parser();
        $gedcom = $parser->parse(storage_path('app/gedcom/file.ged'));

        $individuals = $gedcom->getIndi();
        $families = $gedcom->getFam();
        // $sources        = $gedcom->getSour();
        // $repositories   = $gedcom->getRepo();

        foreach ($individuals as $individual) {
            $this->getIndividual($individual);
        }
        foreach ($families as $family) {
            $this->getFamily($family);
        }

        // foreach ($sources as $source) {
        //     $this->getSource($source);
        // }
        //
        // foreach ($repositories as $repo) {
        //     // echo "<pre>";
        //     // print_r($repo);
        //     // echo "</pre>";
        // }
    }

    private function getIndividual($individual)
    {
        $g_id = $individual->getId(); // Get individual id
            $g_uid = $individual->getUid(); // Get individual uid
            $surn = current($individual->getName())->getSurn(); // Get individual surname
            $givn = current($individual->getName())->getGivn(); // Get individual Givn
            $name = current($individual->getName())->getName(); // Get individual name
            $sex = $individual->getSex(); // Get individual sex
            $title = $individual->getAttr('TITL') ? $individual->getAttr('TITL')->getAttr() : null; // Get individual title attribute
            $birt = $individual->getEven('BIRT') ? $individual->getEven('BIRT') : null; // Get individual birt event
            $deat = $individual->getEven('DEAT') ? $individual->getEven('DEAT') : null; // Get individual deat event
            // $media =$individual->getObje(); // Get individual media
            // $notes =$individual->getNote(); // Get individual notes
            // $sources =$individual->getSour(); // Get individual sources

            $givn = isset($givn) ? $givn : $name;
        $sex = $sex === 'F' ? 'female' : 'male';
        $fullName = $givn.' '.$surn;

        $ind = Individual::create([
                'first_name' => mb_convert_encoding($givn, 'UTF-8', 'UTF-8'),
                'last_name' => mb_convert_encoding($surn, 'UTF-8', 'UTF-8'),
                'gender' => mb_convert_encoding($sex, 'UTF-8', 'UTF-8'),
                'is_active' => true,
                'uuid' => mb_convert_encoding($g_uid, 'UTF-8', 'UTF-8'),
              ]);

        Gedcom::create([
              'g_id' => mb_convert_encoding($g_id, 'UTF-8', 'UTF-8'),
              'gedcom_id' => $ind->id,
              'gedcom_type' => 'App\Individual',
            ]);

        if ($birt) {
            $eventname = $fullName.'\'s birthday';
            $birthday = $birt->getDate() ? $birt->getDate() : 'Unknown Date';
            $place = $birt->getPlac() ? $birt->getPlac()->getPlac() : 'Unknown Place';
            $place = $place === '' ? 'Unknown Place' : $place;
            $eventdescription = $fullName.' was born in '.$birthday.' and at '.$place;
            Event::create([
               'event_type' => 'App\Individual',
               'event_id' => $ind->id,
               'name' => mb_convert_encoding($eventname, 'UTF-8', 'UTF-8'),
               'description' => mb_convert_encoding($eventdescription, 'UTF-8', 'UTF-8'),
               'date' => mb_convert_encoding($birthday, 'UTF-8', 'UTF-8'),
               'event_type_id' => 1,
               'is_active' => true,
             ]);
        }

        if ($deat) {
            $eventname = $fullName.'\'s death';
            $date = $deat->getDate() ? $deat->getDate() : 'Unknown Date';
            $place = $deat->getPlac() ? $deat->getPlac()->getPlac() : 'Unknown Place';
            $place = $place === '' ? 'Unknown Place' : $place;
            $eventdescription = $eventname.' was in '.$date.' and at '.$place;
            Event::create([
                 'event_type' => 'App\Individual',
                 'event_id' => $ind->id,
                 'name' => mb_convert_encoding($eventname, 'UTF-8', 'UTF-8'),
                 'description' => mb_convert_encoding($eventdescription, 'UTF-8', 'UTF-8'),
                 'date' => mb_convert_encoding($date, 'UTF-8', 'UTF-8'),
                 'event_type_id' => 3,
                 'is_active' => true,
               ]);
        }

        if ($title) {
            $attrname = $fullName.'\'s title';
            $date = $individual->getAttr('TITL')->getDate();
            $note = $individual->getAttr('TITL')->getNote() ? current($individual->getattr('titl')->getnote())->getNote() : '';
            $attrdescription = $attrname.' is '.$title; // add to notes
            $attrdescription = $note === '' ? $attrdescription : $attrdescription.' Note: '.$note;
            Note::create([
                'name' => mb_convert_encoding($attrname, 'UTF-8', 'UTF-8'),
                'description' => mb_convert_encoding($attrdescription, 'UTF-8', 'UTF-8'),
                'date' => mb_convert_encoding($date, 'UTF-8', 'UTF-8'),
                'type_id' => 1,
                'is_active' => true,
              ]);
        }

        // foreach ($media as $mediafile){
            //     $title = $mediafile->getTitl();
            //     $file  = $mediafile->getFile();
            //     $file = isset($file) ? $file : 'not available';
            //     if(isset($mediafile)){
            //         $medianame = $givn . ' ' . $surn . '\'s media title is' . $title . ' file is' . $file;
            //     }
            // };
    }

    private function getFamily($family)
    {
        $g_id = $family->getId();
        $husb = $family->getHusb();
        $wife = $family->getWife();
        $childs = $family->getChil();
        $marr = $family->getEven('MARR') ? $family->getEven('MARR') : null;

        $gFather = Gedcom::where('g_id', $husb)->first();
        $gMother = Gedcom::where('g_id', $wife)->first();

        if (isset($gFather->gedcom_id) && isset($gMother->gedcom_id)) {
            $father = Individual::where('id', $gFather->gedcom_id)->first();
            $mother = Individual::where('id', $gMother->gedcom_id)->first();

            if (isset($father) && isset($mother)) {
                $fName = "{$father->first_name} {$father->last_name}";
                $mName = "{$mother->first_name} {$mother->last_name}";
                $description = $fName.' and '.$mName.' family';

                $fam = Family::create([
              'father_id' => $father->id,
              'mother_id' => $mother->id,
              'type_id' => 1,
              'description' => $description,
              'is_active' => true,
            ]);

                Gedcom::create([
              'g_id' => $g_id,
              'gedcom_id' => $fam->id,
              'gedcom_type' => 'App\Family',
            ]);

                $fam->individuals()->save($father, ['type_id' => 1]);

                $fam->individuals()->save($mother, ['type_id' => 2]);

                foreach ($childs as $child) {
                    if (isset($child)) {
                        $childId = Gedcom::where('g_id', $child)->first();
                        if ($childId) {
                            $childInd = Individual::where('id', $childId->gedcom_id)->first();
                        }

                        if ($childInd) {
                            $childInd->families()->save($fam, ['type_id' => 0]);
                        }
                    }
                }

                if ($marr) {
                    $name = 'Marriage of '.$fName.' and '.$mName;
                    $date = $marr->getDate() ? $marr->getDate() : '';
                    $date = $date === '' ? 'Unknown Date' : $date;
                    $description = $fName.' and '.$mName.' married at '.$date;
                    Event::create([
                    'event_type' => 'App\Family',
                    'event_id' => $fam->id,
                    'name' => $name,
                    'description' => $description,
                    'date' => mb_convert_encoding($date, 'UTF-8', 'UTF-8'),
                    'event_type_id' => 2,
                    'is_active' => true,
                ]);
                }
            }
        }
    }

    private function getSource($source)
    {
        // $g_id           = $source->getId();
        // $title          = $source->getTitl();
        // $author         = $source->getAuth();
        // $publication    = $source->getPubl();
        // $repo           = $source->getRepo();
        //
        // $name           = $title;
        // $description    = $title . ' source belongs to ' . $author;
    }
}
