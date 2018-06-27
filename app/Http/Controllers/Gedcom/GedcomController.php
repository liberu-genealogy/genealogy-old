<?php

namespace App\Http\Controllers\Gedcom;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gedcom;
use App\Individual;
use App\Family;
use App\Event;
use App\Note;

class GedcomController extends Controller
{

  /*
  * Api end-point for Gedcom api/gedcom/store
  * Saving uploaded file to storage and starting to read
  */

  public function store(Request $request)
  {
    if($request->hasFile('file')){
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

        $individuals    = $gedcom->getIndi();
        $families       = $gedcom->getFam();
        $sources        = $gedcom->getSour();
        $repositories   = $gedcom->getRepo();

        foreach ($individuals as $individual) {
            $this->getIndividual($individual);
        }
        foreach ($families as $family) {
            $this->getFamily($family);
        }

        foreach ($sources as $source) {
            $this->getSource($source);
        }

        foreach ($repositories as $repo) {
            // echo "<pre>";
            // print_r($repo);
            // echo "</pre>";
        }
    }

    private function getIndividual ($individual){
            $g_id = $individual->getId(); // Get individual id
            $surn = current($individual->getName())->getSurn(); // Get individual surname
            $givn = current($individual->getName())->getGivn(); // Get individual Givn
            $name = current($individual->getName())->getName(); // Get individual name
            $sex  = $individual->getSex(); // Get individual sex
            $attrs = $individual->getAttr(); // Get individual attributes
            $events =$individual->getEven(); // Get individual events
            $media =$individual->getObje(); // Get individual media
            $notes =$individual->getNote(); // Get individual notes
            $sources =$individual->getSour(); // Get individual sources


            $name = isset($givn) ? $name . ' ' . $givn : $name;
            $sex = $sex == 'F' ? 'female' : 'male';

            $ind = Individual::create([
              'first_name' => mb_convert_encoding($name, 'UTF-8', 'UTF-8'),
              'last_name'  => mb_convert_encoding($surn, 'UTF-8', 'UTF-8'),
              'gender'     => mb_convert_encoding($sex, 'UTF-8', 'UTF-8'),
              'is_active'  => true,
            ]);

            Gedcom::create([
              'g_id' => mb_convert_encoding($g_id, 'UTF-8', 'UTF-8'),
              'gedcom_id' => $ind->id,
              'gedcom_type' => 'App\Individual'
            ]);

            foreach ($events as $event){
                $type = $event->getType(); // Example types "BIRT" "DEAT" "BURI" should be defined at db  http://wiki-en.genealogy.net/GEDCOM-Tags
                $date = $this->get_date($event->getDate());
                $place = $this->get_place($event->getPlac());
                $place = isset($place) ? $place : 'Unknown';
                $date = isset($date) ? $date : 'Unknown';
                if($type == "BIRT"){
                    $eventname = $name . ' ' . $surn . '\'s birth';
                    $eventdescription = $eventname . ' at ' . $date. ' and '. $place;
                    Event::create([
                      'event_type' => 'App\Individual',
                      'event_id'   => $ind->id,
                      'name' => mb_convert_encoding($eventname, 'UTF-8', 'UTF-8'),
                      'description' => mb_convert_encoding($eventdescription, 'UTF-8', 'UTF-8'),
                      'date' => mb_convert_encoding($date, 'UTF-8', 'UTF-8'),
                      'event_type_id' => 1,
                      'is_active' => true
                    ]);
                }
                if($type == "DEAT"){
                    $eventname = $name . ' ' . $surn . '\'s death';
                    $eventdescription = $eventname . ' at ' . $date. ' and '. $place;
                    Event::create([
                      'event_type' => 'App\Individual',
                      'event_id'   => $ind->id,
                      'name' => mb_convert_encoding($eventname, 'UTF-8', 'UTF-8'),
                      'description' => mb_convert_encoding($eventdescription, 'UTF-8', 'UTF-8'),
                      'date' => mb_convert_encoding($date, 'UTF-8', 'UTF-8'),
                      'event_type_id' => 3,
                      'is_active' => true
                    ]);
                }
            };

            foreach ($attrs as $attr){
                $attrtype = $attr->getType();
                $att = $attr->getAttr();
                $date = $this->get_date($attr->getDate());
                $place = $this->get_place($attr->getPlac());
                if(count($attr->getNote())>0){
                  $note = current($attr->getNote())->getNote();
                }
                else{
                    $note = '';
                }

                if($attrtype == "TITL"){
                    $attrname = $name . ' ' . $surn . '\'s title';
                    $attrdescription = $attrname . ' was ' . $att; // add to notes
                    $attrdescription = $note === '' ? $attrdescription : $attrdescription . ' Note: ' . $note;
                    Note::create([
                      'name' => mb_convert_encoding($attrname, 'UTF-8', 'UTF-8'),
                      'description' => mb_convert_encoding($attrdescription, 'UTF-8', 'UTF-8'),
                      'date' => mb_convert_encoding($date, 'UTF-8', 'UTF-8'),
                      'type_id' => 1,
                      'is_active' => true
                    ]);
                }
            };

            foreach ($media as $mediafile){
                $title = $mediafile->getTitl();
                $file  = $mediafile->getFile();
                $file = isset($file) ? $file : 'not available';
                if(isset($mediafile)){
                    $medianame = $name . ' ' . $surn . '\'s media title is' . $title . ' file is' . $file;
                }
            };
    }

    private function getFamily($family){
        $g_id = $family->getId() ;
        $husb = $family->getHusb();
        $wife = $family->getWife();
        $childs = $family->getChil();
        $events =$family->getEven();



        $gFather = Gedcom::where('g_id', $husb)->first();
        $gMother = Gedcom::where('g_id', $wife)->first();

        if (isset($gFather->gedcom_id) && isset($gMother->gedcom_id)){
          $father = Individual::where('id', $gFather->gedcom_id)->first();
          $mother = Individual::where('id', $gMother->gedcom_id)->first();

          if(isset($father) && isset($mother)){
            $fName = "{$father->first_name} {$father->last_name}";
            $mName = "{$mother->first_name} {$mother->last_name}";
          }
          else{
            $fName = 'Database error';
            $mName = 'Database error';
          }


          $description = $fName . ' and ' . $mName . ' family';
          $fam = Family::create([
            'father_id' => $father->id,
            'mother_id' => $mother->id,
            'type_id'   => 1,
            'description' => $description,
            'is_active' => true
          ]);
          $fam->individuals()->attach([
            'individual_id' => $father->id,
            'type_id' => 1
          ]);

          $fam->individuals()->attach([
            'individual_id' => $mother->id,
            'type_id' => 2
          ]);


          foreach ($childs as $child) {
            if(isset($child)){
            $child = Gedcom::where('g_id', $child)->first();
            $child = Individual::where('id', $child->gedcom_id)->first();
            if($child){
              $child->families()->attach([
                'family_id' => $fam->id,
                'type_id' => 0
              ]);
            }
            }
          }

        }



        foreach ($events as $event){
            $eventtype = $event->getType();
            $date = $this->get_date($event->getDate());
            $date = isset($date) ? $date : 'Unknown';
            if ($eventtype == "MARR") {
                $name = 'Marriage of ' . $fName . ' and ' . $mName;
                $description = $fName . ' and ' . $mName . ' are married at ' . $date;
                if(isset($fam)){
                  Event::create([
                    'event_type' => 'App\Family',
                    'event_id'   => $fam->id,
                    'name' => $name,
                    'description' => $description,
                    'date' => mb_convert_encoding($date, 'UTF-8', 'UTF-8'),
                    'event_type_id' => 2,
                    'is_active' => false
                  ]);
                }
            }
        };
    }

    private function getSource($source){
        $g_id           = $source->getId();
        $title          = $source->getTitl();
        $author         = $source->getAuth();
        $publication    = $source->getPubl();
        $repo           = $source->getRepo();

        $name           = $title;
        $description    = $title . ' source belongs to ' . $author;

    }

    private function get_date($input_date){
        return "$input_date";
    }

    private function get_place($place){
        if(is_object($place)){
            $place = $place->getPlac();
        }
        return $place;
    }
}
