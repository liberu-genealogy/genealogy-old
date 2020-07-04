<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSubmRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $subm = $this->route('subm');

        return [

            'group' => 'required|max:50',
            'gid' => 'required|max:50',
            'name' => 'required|max:50',
            'addr_id' => 'required|max:50',
            'rin' => 'required|max:50',
            'rfn' => 'required|max:50',
            'lang' => 'required|max:50',
            'phon' => 'required|max:50',
        ];
    }
}
