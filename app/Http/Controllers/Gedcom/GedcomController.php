<?php

namespace App\Http\Controllers\Gedcom;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

  protected $persons_id = array();
  protected $list = array();
  protected $familylist = array();

  private function readData()
  {
    $parser = new \PhpGedcom\Parser();
    $gedcom = $parser->parse(storage_path('app/gedcom/file.ged'));

    $individuals    = $gedcom->getIndi();
    $families       = $gedcom->getFam();
    foreach ($individuals as $individual) {
        $this->get_Person($individual);
    }
    foreach ($families as $family) {
        $this->get_Family($family);
    }
  }

  private function get_Person($individual){
          $g_id   = $individual->getId();
          $surn   = current($individual->getName())->getSurn();
          $givn   = current($individual->getName())->getGivn();
          $name   = current($individual->getName())->getName();
          $sex    = $individual->getSex();
          $attr   = $individual->getAttr();
          $events = $individual->getEven();
          $media  = $individual->getObje();

          if($givn == "") {
              $givn = $name;
          }

          $sex = $sex === 'F' ? 'female' : 'male';
          $surn = isset($surn) ? $surn : 'No Surname';

          foreach($events as $event){
              $date = $this->get_date($event->getDate());
              $place = $this->get_place($event->getPlac());
              if(isset($date) || isset($place)){
                $place = isset($place) ? $place : 'No place';
                Event::create([
                  'event_type' => 'App\Individual',
                  'event_date' => $date,
                  'event_id'   => 1,
                  'name' => mb_convert_encoding($place, 'UTF-8', 'UTF-8'),
                  'description' => mb_convert_encoding($place, 'UTF-8', 'UTF-8'),
                  'event_type_id' => 1
                ]);
              }
          };

          foreach($attr as $event){
              $date = $this->get_date($event->getDate());
              $place = $this->get_place($event->getPlac());
              if(count($event->getNote())>0){
                  $note = current($event->getNote())->getNote();
              }
              else{
                  $note = '';
              }
              if(isset($date) || isset($place)){
                $place = isset($place) ? $place : 'No place';
                Note::create([
                  'name' => mb_convert_encoding($place, 'UTF-8', 'UTF-8'),
                  'date' => mb_convert_encoding($date, 'UTF-8', 'UTF-8'),
                  'description' => mb_convert_encoding($note, 'UTF-8', 'UTF-8'),
                ]);
              }
          };
          foreach ($media as $mediafile){
              $title = $mediafile->getTitl();
              $file  = $mediafile->getFile();
              if(isset($title) || isset($file)){
                Note::create([
                  'name' => mb_convert_encoding($title, 'UTF-8', 'UTF-8'),
                  'description' => mb_convert_encoding($file, 'UTF-8', 'UTF-8')
                ]);
              }
          };
          Individual::create([
            'first_name' => $name,
            'last_name'  => $surn,
            'gender'     => $sex,
            'is_active'  => false
          ]);
  }

  private function get_Family($family){
      $g_id = $family->getId() ;
      $husb = $family->getHusb();
      $wife = $family->getWife();
      $children = $family->getChil();
      $events =$family->getEven();
      $husband_id = (isset($this->persons_id[$husb])) ? $this->persons_id[$husb]: 0;
      $wife_id    = (isset($this->persons_id[$wife])) ? $this->persons_id[$wife]: 0;

      Family::create([
        'father_id' => rand(1,100),
        'mother_id' => rand(1,100),
        'description' => $g_id . ' family',
        'type_id' => 1
      ]); //father and mother id should be gedcom(string) type, not integer

      foreach($children as $child){
          if (isset($this->persons_id[$child])){
              $individual = Individual::find($this->persons_id[$child]);
              $individual->children()->save($individual);
          }
      }
      foreach ($events as $event){
          $date = $this->get_date($event->getDate());
          $place = $this->get_place($event->getPlac());
          if(isset($date) || isset($place)){
            $place = isset($place) ? $place : 'No place';
            Event::create([
              'event_type' => 'App\Family',
              'event_date' => mb_convert_encoding($date, 'UTF-8', 'UTF-8'),
              'event_id'   => 1,
              'name' => mb_convert_encoding($place, 'UTF-8', 'UTF-8'),
              'description' => mb_convert_encoding($place, 'UTF-8', 'UTF-8'),
              'event_type_id' => 1
            ]);
          }
      };
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
