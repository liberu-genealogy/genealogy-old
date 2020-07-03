<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSourceDataRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $sourcedata = $this->route('sourcedata');

        return [

            'group' => 'required|max:50',
            'gid' => 'required|max:50',
            'date' => 'required|max:50',
            'text' => 'required|max:50',
            'agnc' => 'required|max:50',
        ];
    }
}
