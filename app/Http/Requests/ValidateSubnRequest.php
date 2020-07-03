<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSubnRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $subn = $this->route('subn');

        return [

            'subm' => 'required|max:50',
            'famf' => 'required|max:50',
            'temp' => 'required|max:50',
            'ance' => 'required|max:50',
            'desc' => 'required|max:50',
            'ordi' => 'required|max:50',
            'rin' => 'required|max:50',

        ];
    }
}
