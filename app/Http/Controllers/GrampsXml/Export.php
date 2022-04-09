<?php

namespace App\Http\Controllers\GrampsXml;

use App\Models\Family;
use App\Models\FamilyEvent;
use App\Models\Person;
use Flowgistics\XML\Transformers\ArrayTransformer;
use Flowgistics\XML\XML;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Export extends Controller
{
    public function export(Request $request)
    {
        $data = [];

        $families = Family::all();

        foreach ($families as $family) {
            $familyId = $family->id;
            $description = $family->description;

            $husband = $this->getPersonDetail($family->husband()->first());
            $wife = $this->getPersonDetail($family->wife()->first());

            $children = $family->children()->get();
            $childrenArr = [];

            foreach ($children as $child) {
                $per = $this->getPersonDetail($child);
                array_push($childrenArr, $per);
            }

            array_push($data, [
                'id'=>$familyId,
                'description'=>$description,
                'husband'=>$husband,
                'wife'=>$wife,
                'child'=>$childrenArr,
            ]);
        }

        $xml = XML::export(['family'=>$data])->rootTag('database')
            ->toString();

        return $xml;
    }

    protected function getPersonDetail($person)
    {
        return [
            'name'=>[
                'first_name'=>$person->givn,
                'last_name'=>$person->surn,
            ],
            'gender'=>$person->getSex(),
            'birthday'=>substr($person->birthday, 0, 10),
            'parent_id'=>$person->child_in_family_id,
        ];
    }
}
