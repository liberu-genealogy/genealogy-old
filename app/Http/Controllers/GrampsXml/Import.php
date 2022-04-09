<?php

namespace App\Http\Controllers\GrampsXml;

use App\Models\Family;
use App\Models\FamilyEvent;
use App\Models\Person;
use Flowgistics\XML\Transformers\ArrayTransformer;
use Flowgistics\XML\XML;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Import extends Controller
{
    /**
     * Import family tree as GRAMPS XML file
     * - Accepts XML file
     * - Validates data and shows error if there is any.
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:xml'],
        ]);

        // save file as temp and convert to json
        $res = $this->fileToJson($request);

        $fileName = $res[0];
        $families = $res[1]['family'];

        if (array_key_exists('husband', $families) || array_key_exists('wife', $families)) {
            $families = [$families];
        }

        $errors = [];
        foreach ($families as $key=>$family) {
            // Validate family
            $error = $this->validateFamily($family);

            if (count($error) > 0) {
                $errors['Family-'.$key + 1] = $error;
                continue;
            }

            $description = $family['description'];

            $husband = $this->createPerson($family['husband'], null, 'M');
            $wife = $this->createPerson($family['wife'], null, 'F');

            $fam = Family::where('husband_id', $husband->id)->where('wife_id', $wife->id)->first();

            if (! $fam) {
                $fam = Family::create([
                    'description'=>$description,
                    'husband_id'=>$husband->id,
                    'wife_id'=>$wife->id,
                ]);
            }

            foreach ($family['child'] as $child) {
                $this->createPerson($child, $fam->id);
            }
        }

        // remove temp file after importing
        Storage::delete('files/temp/'.$fileName);

        if (count($errors) > 0) {
            return ['errors'=>$errors];
        }

        return json_encode([
            'message'=> 'File imported successfully',
        ]);
    }

    protected function fileToJson($request)
    {
        $fileName = 'temp'.uniqid().'.xml';

        $file = $request->file('file')->storeAs('/files/temp', $fileName);

        $xmlDataString = file_get_contents(storage_path('app/files/temp/'.$fileName));
        $xmlObject = simplexml_load_string($xmlDataString);

        $json = json_encode($xmlObject);

        return [$fileName, json_decode($json, true)];
    }

    protected function validateFamily($family)
    {
        return Validator::make($family, [
            'description'=>'sometimes|string',
            'husband.birthday'=>'required|date',
            'husband.name.first_name'=>'required|string',
            'husband.name.last_name'=>'required|string',
            'wife.birthday'=>'required|date',
            'wife.name.first_name'=>'required|string',
            'wife.name.last_name'=>'required|string',
            'child.*.birthday'=>'required|date',
            'child.*.name.first_name'=>'required|string',
            'child.*.name.last_name'=>'required|string',
            'child.*.gender'=>'required|string',
        ])->errors();
    }

    protected function createPerson($arr, $parentId = null, $defaultGender = null)
    {
        $p = Person::where('givn', $arr['name']['first_name'])->where('surn', $arr['name']['last_name'])->where('birthday', $arr['birthday'].' 00:00:00')->first();

        if ($p) {
            if ($parentId) {
                $p->child_in_family_id = $parentId;
                $p->save();
            }

            return $p;
        }

        return Person::create([
            'givn'=>$arr['name']['first_name'],
            'surn'=>$arr['name']['last_name'],
            'sex'=>$arr['gender'] ?? null ? substr($arr['gender'], 0, 1) : $defaultGender,
            'birthday'=>$arr['birthday'],
            'child_in_family_id'=>$parentId,
        ]);
    }
}
