<?php

namespace App\Http\Controllers\Trees;

use App\Jobs\ExportGedCom;
use App\Models\Family;
use App\Models\Note;
use App\Models\Person;
use File;
use GenealogiaWebsite\LaravelGedcom\Utils\GedcomGenerator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        $nest = $request->get('nest');
        $ret = [];
        $ret['start'] = (int) $start_id;
        $this->persons = [];
        $this->unions = [];
        $this->links = [];
        $this->nest = $nest;
        // $this->getGraphData((int)$start_id);
        $this->getGraphDataUpward((int) $start_id);
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
            $nest++;

            // add family
            $families = Family::where('husband_id', $start_id)->orwhere('wife_id', $start_id)->get();
            $own_unions = [];

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
                        $_union_ids[] = $item->id;
                    }
                    $mother->setAttribute('own_unions', $_union_ids);
                    $this->persons[$mother->id] = $mother;
                    $this->links[] = [$mother->id, 'u'.$family_id];
                }

                // find children
                $children = Person::where('child_in_family_id', $family_id)->get();
                $children_ids = [];
                foreach ($children as $child) {
                    $child_id = $child->id;
                    // add child to person
                    // parent_union
                    $child_data = Person::find($child_id);
                    $_families = Family::where('husband_id', $child_id)->orwhere('wife_id', $child_id)->select('id')->get();
                    $_union_ids = [];
                    foreach ($_families as $item) {
                        $_union_ids[] = $item->id;
                    }
                    $child_data->setAttribute('own_unions', $_union_ids);
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

    private function getGraphDataUpward($start_id, $nest = 0)
    {
        $threshold = (int) ($this->nest) * 1;
        $has = (int) ($nest) * 1;
        if ($threshold >= $has) {
            $person = Person::find($start_id);
            // do not process for null
            if ($person == null) {
                return;
            }

            // do not process again
            if (array_key_exists($start_id, $this->persons)) {
                return;
            }
            // do self
            if (! array_key_exists($start_id, $this->persons)) {
                // this is not added
                $_families = Family::where('husband_id', $start_id)->orwhere('wife_id', $start_id)->select('id')->get();
                $_union_ids = [];
                foreach ($_families as $item) {
                    $_union_ids[] = 'u'.$item->id;
                    // add current family link
                    // $this->links[] = [$start_id, 'u'.$item->id];
                    array_unshift($this->links, [$start_id, 'u'.$item->id]);
                }
                $person->setAttribute('own_unions', $_union_ids);
                $person->setAttribute('parent_union', 'u'.$person->child_in_family_id);
                // add to persons
                $this->persons[$start_id] = $person;

                // get self's parents data
                $p_family_id = $person->child_in_family_id;
                if (! empty($p_family_id)) {
                    // add parent family link
                    // $this->links[] = ['u'.$p_family_id,  $start_id] ;
                    array_unshift($this->links, ['u'.$p_family_id,  $start_id]);
                    $p_family = Family::find($p_family_id);
                    if (isset($p_family->husband_id)) {
                        $p_fatherid = $p_family->husband_id;
                        $this->getGraphDataUpward($p_fatherid, $nest + 1);
                    }
                    if (isset($p_family->wife_id)) {
                        $p_motherid = $p_family->wife_id;
                        $this->getGraphDataUpward($p_motherid, $nest + 1);
                    }
                }
            }
            // get partner
            $cu_families = Family::where('husband_id', $start_id)->orwhere('wife_id', $start_id)->get();
            foreach ($cu_families as $family) {
                $family_id = $family->id;
                $father = Person::find($family->husband_id);
                $mother = Person::find($family->wife_id);
                if (isset($father->id)) {
                    if (! array_key_exists($father->id, $this->persons)) {
                        // this is not added
                        $_families = Family::where('husband_id', $father->id)->orwhere('wife_id', $father->id)->select('id')->get();
                        $_union_ids = [];
                        foreach ($_families as $item) {
                            $_union_ids[] = 'u'.$item->id;
                        }
                        $father->setAttribute('own_unions', $_union_ids);
                        $father->setAttribute('parent_union', 'u'.$father->child_in_family_id);
                        // add to persons
                        $this->persons[$father->id] = $father;

                        // add current family link
                        // $this->links[] = [$father->id, 'u'.$family_id];
                        array_unshift($this->links, [$father->id, 'u'.$family_id]);
                        // get husband's parents data
                        $p_family_id = $father->child_in_family_id;
                        if (! empty($p_family_id)) {
                            // add parent family link
                            // $this->links[] = ['u'.$p_family_id,  $father->id] ;
                            array_unshift($this->links, ['u'.$p_family_id,  $father->id]);
                            $p_family = Family::find($p_family_id);
                            if (isset($p_family->husband_id)) {
                                $p_fatherid = $p_family->husband_id;
                                $this->getGraphDataUpward($p_fatherid, $nest + 1);
                            }
                            if (isset($p_family->wife_id)) {
                                $p_motherid = $p_family->wife_id;
                                $this->getGraphDataUpward($p_motherid, $nest + 1);
                            }
                        }
                    }
                }
                if (isset($mother->id)) {
                    if (! array_key_exists($mother->id, $this->persons)) {
                        // this is not added
                        $_families = Family::where('husband_id', $mother->id)->orwhere('wife_id', $mother->id)->select('id')->get();
                        $_union_ids = [];
                        foreach ($_families as $item) {
                            $_union_ids[] = $item->id;
                        }
                        $mother->setAttribute('own_unions', $_union_ids);
                        $mother->setAttribute('parent_union', 'u'.$mother->child_in_family_id);
                        // add to person
                        $this->persons[$mother->id] = $mother;
                        // add current family link
                        // $this->links[] = [$mother->id, 'u'.$family_id];
                        array_unshift($this->links, [$mother->id, 'u'.$family_id]);
                        // get wifee's parents data
                        $p_family_id = $mother->child_in_family_id;
                        if (! empty($p_family_id)) {
                            // add parent family link
                            // $this->links[] = ['u'.$p_family_id,  $father->id] ;
                            array_unshift($this->links, ['u'.$p_family_id,  $mother->id]);

                            $p_family = Family::find($p_family_id);
                            if (isset($p_family->husband_id)) {
                                $p_fatherid = $p_family->husband_id;
                                $this->getGraphDataUpward($p_fatherid, $nest + 1);
                            }
                            if (isset($p_family->wife_id)) {
                                $p_motherid = $p_family->wife_id;
                                $this->getGraphDataUpward($p_motherid, $nest + 1);
                            }
                        }
                    }
                }

                // find children
                $children = Person::where('child_in_family_id', $family_id)->get();
                $children_ids = [];
                foreach ($children as $child) {
                    $child_id = $child->id;
                    $children_ids[] = $child_id;
                }

                // compose union item and add to unions
                $union = [];
                $union['id'] = 'u'.$family_id;
                $union['partner'] = [isset($father->id) ? $father->id : null, isset($mother->id) ? $mother->id : null];
                $union['children'] = $children_ids;
                $this->unions['u'.$family_id] = $union;
            }
            // get brother/sisters
            $brothers = Person::where('child_in_family_id', $person->child_in_family_id)
            ->whereNotNull('child_in_family_id')
            ->where('id', '<>', $start_id)->get();
            // $nest = $nest -1;
            foreach ($brothers as $brother) {
                $this->getGraphDataUpward($brother->id, $nest);
            }
        } else {
            return;
        }
    }
}
