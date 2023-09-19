<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSourceDataEvenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $this->route('sourcedataeven');

        return [

            'date' => 'required|max:50',
            'plac' => 'required|max:50',
        ];
    }
}
