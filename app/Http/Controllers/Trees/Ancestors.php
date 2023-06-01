<?php

namespace App\Http\Controllers\Trees;

use App\Models\Family;
use App\Models\Person;
use File;
use GenealogiaWebsite\LaravelGedcom\Utils\GedcomGenerator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Response;

class Ancestors extends Controller
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

        return $ret;
    }

    private function getParents(Person $person)
    {
        $p_family_id = $person->child_in_family_id;
        $p_family = Family::find($p_family_id);
        if ($p_family == null) {
            return [];
        }
        $parents = Person::where('id', $p_family->husband_id)->orwhere('id', $p_family->wife_id)->get();

        return $parents;
    }

    private function getGraphData($start_id, $nest = 1)
    {
        if ($this->nest < $nest) {
            return;
        }

        $person = Person::find($start_id);
        // do not process for null
        if ($person == null) {
            return;
        }

        $families = Family::where('husband_id', $start_id)->orwhere('wife_id', $start_id)->get();
        if (! count($families)) {
            $person->setAttribute('own_unions', []);
            $person['generation'] = $nest;
            $this->persons[$start_id] = $person;

            return true;
        }
        $own_unions = $families->pluck('id')->map(function ($id) {
            return 'u'.$id;
        })->toArray();
        $person->setAttribute('own_unions', $own_unions);
        $person['generation'] = $nest;
        $this->persons[$start_id] = $person;

        foreach ($families as $family) {
            $union_id = 'u'.$family->id;
            $own_unions[] = $union_id;
            $this->links[] = [$start_id, $union_id];
            $this->unions[$union_id] = [
                'id' => $union_id,
                'partner' => [isset($family->husband_id) ? $family->husband_id : null, isset($family->wife_id) ? $family->wife_id : null],
                'children' => $family->children->pluck('id')->toArray(),
            ];

            $parents = $this->getParents($person);
            foreach ($parents as $parent) {
                $this->links[] = ['u'.$family->id, $parent->id];
                $this->persons[$parent->id] = $parent;
                $this->getGraphData($parent->id, $nest + 1);
            }
        }
    }

    // private function getGraphData($start_id, $nest = 1)
    // {
    //     if ($this->nest >= $nest) {

    //         $person = Person::find($start_id);

    //         // do not process for null
    //         if ($person == null) {
    //             return;
    //         }

    //         $families = Family::where('husband_id', $start_id)->orwhere('wife_id', $start_id)->get();

    //         if (!count($families)) {
    //             $person->setAttribute('own_unions', []);
    //             $person['generation'] = $nest;
    //             $this->persons[$start_id] = $person;

    //             return true;
    //         }

    //         foreach ($families as $family) {

    //             $_union_ids[] = 'u' . $person->child_in_family_id;

    //             $person->setAttribute('own_unions', $_union_ids);
    //             $this->persons[$start_id] = $person;
    //             $this->links[] = [$start_id, 'u' . $person->child_in_family_id];

    //             // get self's parents data
    //             $p_family_id = $person->child_in_family_id;
    //             $p_family_ids = [];

    //             if (!empty($p_family_id)) {

    //                 $p_family = Family::find($p_family_id);

    //                 $parent = Person::where('id', $p_family->husband_id)->orwhere('id', $p_family->wife_id)->get();

    //                 foreach ($parent as $p_person) {
    //                     $p_data = Person::find($p_person->id);
    //                     $p_union_ids = [];
    //                     $p_union_ids[] = 'u' . $p_person->child_in_family_id;
    //                     $p_data->setAttribute('own_unions', $p_union_ids);
    //                     $p_data['generation'] = $nest + 1;
    //                     $this->persons[$p_person->id] = $p_data;

    //                     // add union-parent link
    //                     $this->links[] = ['u' . $family->id, $p_person->id];
    //                     $p_family_ids[] = $p_person->id;
    //                     $this->getGraphData($p_person->id, $nest + 1);
    //                 }

    //                 // get Parents' Partners

    //                 // if ($nest <= 6) {
    //                 //     $parentFamilyIds = Person::where('id', $p_family->husband_id)->orwhere('id', $p_family->wife_id)->select('child_in_family_id')->get();
    //                 //     foreach($parentFamilyIds as $parentFamilyId) {
    //                 //         if (!empty($parentFamilyId)) {
    //                 //             array_unshift($this->links, ['u'.$parentFamilyId->child_in_family_id,  $start_id]);

    //                 //             $parentFamily = Family::find($parentFamilyId->child_in_family_id);

    //                 //             if (isset($parentFamily)) {
    //                 //                 // find Parent's Partner
    //                 //                 $parentPartners = Person::where('child_in_family_id', $parentFamily->id)->get();

    //                 //                 foreach($parentPartners as $parentPartner) {
    //                 //                     $pp_data = Person::find($parentPartner->id);
    //                 //                     $pp_union_ids = [];
    //                 //                     $pp_union_ids[] = 'u'.$parentFamily->id;
    //                 //                     $pp_data->setAttribute('own_unions', $pp_union_ids);
    //                 //                     $pp_data['generation'] = $nest + 1;
    //                 //                     $this->persons[$parentPartner->id] = $pp_data;

    //                 //                     // add union-parent link
    //                 //                     $this->links[] = ['u'.$family->id, $parentPartner->id];
    //                 //                     $p_family_ids[] = $parentPartner->id;
    //                 //                     $this->getGraphData($parentPartner->id, $nest + 1);
    //                 //                 }
    //                 //             }
    //                 //         }
    //                 //     }
    //                 // }

    //                 // compose union item and add to unions
    //                 $union = [];
    //                 $union['id'] = 'u' . $family->id;
    //                 $union['partner'] = [isset($family->husband_id) ? $family->husband_id : null, isset($family->wife_id) ? $family->wife_id : null];
    //                 $union['children'] = $p_family_ids;
    //                 $this->unions['u' . $p_family_id] = $union;
    //             }
    //         }
    //     }

    //     return true;
    // }
}
