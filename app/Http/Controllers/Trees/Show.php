<?php

namespace App\Http\Controllers\Trees;

use App\Note;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Family;
use App\Person;

class Show extends Controller
{
    private $persons;
    private $unions;
    private $links;
    private $nest;
    public function __invoke(Request $request)
    {
        $start_id = $request->get('start_id', 1);
        $nest = $request->get('nest', 3);
        $ret = array();
        $ret['start'] = $start_id;
        $this->persons = array();
        $this->unions = array();
        $this->links = [];
        $this->nest = $nest;
        $this->getGraphData(2);
        $ret['persons'] = $this->persons;
        $ret['unions'] = $this->unions;
        $ret['links'] = $this->links;
        return $ret;
    }

    private function getGraphData($start_id, $nest = 1){
        if($this->nest >= $nest){
            $nest++;
            // get unions first
            $person = Person::find($start_id);
            
            // add family
            $families = Family::where('husband_id', $start_id)->orwhere('wife_id', $start_id)->get();
            $own_unions = [];



            // add children
            foreach($families as $family) {
                $family_id = $family->id;

                $father = Person::find($family->husband_id);
                $mother = Person::find($family->wife_id);
                // add partner to person
                // add partner link

                if(isset($father->id)){
                    $_families = Family::where('husband_id', $father->id)->orwhere('wife_id', $father->id)->select('id')->get()->toArray();
                    $father->setAttribute('own_unions', $_families);
                    $this->persons[$father->id] = $father;
                    $this->links[] = [$father->id, $family_id];
                }
                if(isset($mother->id)){
                    $_families = Family::where('husband_id', $mother->id)->orwhere('wife_id', $mother->id)->select('id')->get()->toArray();
                    $mother->setAttribute('own_unions', $_families);
                    $this->persons[$mother->id] = $mother;
                    $this->links[] = [$mother->id, $family_id];
                }

                // "u1": { "id": "u1", "partner": ["id1", "id2"], "children": ["id3", "id4", "id11"] },

                // find children
                $children = Person::where('child_in_family_id', $family_id)->get();
                $children_ids = [];
                foreach($children as $child){
                    $child_id = $child->id;
                    // add child to person
                    // parent_union
                    $child_data = Person::find($child_id);
                    $_families = Family::where('husband_id', $child_id)->orwhere('wife_id', $child_id)->select('id')->get()->toArray();

                    $this->persons[$child_id] = $child_data;

                    // add union-child link
                    $this->links[] = [$family_id, $child_id];

                    // make union child filds
                    $children_ids[] = $child_id;
                    $this->getGraphData($child_id,$nest);
                }

                // compose union item and add to unions
                $union = array();
                $union['id'] = $family_id;
                $union['partner'] = [isset($father->id) ? $father->id : null, isset($mother->id)? $mother->id: null];
                $union['children'] = $children_ids;
                $this->unions[$family_id] = $union;
                $own_unions[] = $family_id;
            }
        }
        return true;
    }
}
