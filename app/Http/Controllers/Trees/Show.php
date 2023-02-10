<?php

namespace App\Http\Controllers\Trees;

use App\Models\Family;
use File;
use GenealogiaWebsite\LaravelGedcom\Utils\GedcomGenerator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Person;
use Response;

class Show extends Controller
{
    private $persons;
    private $unions;
    private $links;
    private $nest;

    public function __invoke(Request $request)
    {
        $start_id = $request->get('start_id');
        $nest = $request->get('generation');
        $ret = [];
        $ret['start'] = (int) $start_id;
        $this->persons = [];
        $this->unions = [];
        $this->links = [];
        $this->nest = $nest;
        $this->getGraphData((int) $start_id);
        $ret['persons'] = $this->persons;
        $ret['unions'] = $this->unions;
        $ret['links'] = $this->links;
        // ExportGedCom::dispatch(2, $request);
        // $file = 'file.GED';
        // $destinationPath = public_path().'/upload/';
        // $ret['link'] = $destinationPath.$file;

        return $ret;
    }

    private function getGraphData($start_id, $nest = 1)
    {
        if ($this->nest >= $nest) {

            // add family
            $families = Family::where('husband_id', $start_id)->orwhere('wife_id', $start_id)->get();

            if (!count($families)) {
                $person = Person::find($start_id);

                // do not process for null
                if ($person == null) {
                    return;
                }

                $person->setAttribute('own_unions', []);
                $person['generation'] = $nest;
                $this->persons[$start_id] = $person;
            
                return true;
            }

            // add children
            foreach ($families as $family) {
                $family_id = $family->id;
                $father = Person::find($family->husband_id);
                $mother = Person::find($family->wife_id);
                // add partner to person
                // add partner link

                if (isset($father->id)) {
                    $_families = Family::where('husband_id', $father->id)->orwhere('wife_id', $father->id)->select('id')->get();
                    $_union_ids = [];
                    foreach ($_families as $item) {
                        $_union_ids[] = 'u'.$item->id;
                    }
                    $father->setAttribute('own_unions', $_union_ids);
                    $this->persons[$father->id] = $father;
                    $this->links[] = [$father->id, 'u'.$family_id];
                }
                if (isset($mother->id)) {
                    $_families = Family::where('husband_id', $mother->id)->orwhere('wife_id', $mother->id)->select('id')->get();
                    $_union_ids = [];
                    foreach ($_families as $item) {
                        $_union_ids[] = 'u'.$item->id;
                    }
                    $mother->setAttribute('own_unions', $_union_ids);
                    $this->persons[$mother->id] = $mother;
                    $this->links[] = [$mother->id, 'u'.$family_id];
                }

                // find children
                $children = Person::where('child_in_family_id', $family_id)->get();
                $children_ids = [];
                $nest++;
                foreach ($children as $child) {
                    $child_id = $child->id;
                    // add child to person
                    // parent_union
                    $child_data = Person::find($child_id);
                    $_families = Family::where('husband_id', $child_id)->orwhere('wife_id', $child_id)->select('id')->get();
                    $_union_ids = [];
                    foreach ($_families as $item) {
                        $_union_ids[] = 'u'.$item->id;
                    }
                    $child_data->setAttribute('own_unions', $_union_ids);
                    $child_data['generation'] = $nest;
                    $this->persons[$child_id] = $child_data;

                    // add union-child link
                    $this->links[] = ['u'.$family_id, $child_id];

                    // make union child filds
                    $children_ids[] = $child_id;
                    $this->getGraphData($child_id, $nest);
                }

                // compose union item and add to unions
                $union = [];
                $union['id'] = 'u'.$family_id;
                $union['partner'] = [isset($father->id) ? $father->id : null, isset($mother->id) ? $mother->id : null];
                $union['children'] = $children_ids;
                $this->unions['u'.$family_id] = $union;
            }
        }

        return true;
    }
}
