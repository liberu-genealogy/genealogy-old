<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSourceDataEvenRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $sourcedataeven = $this->route('sourcedataeven');

        return [

            'date' => 'required|max:50',
            'plac' => 'required|max:50',
        ];
    }
}
