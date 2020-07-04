<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAddrRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $addresses = $this->route('addresses');

        return [

            'adr1' => 'required|max:50',
            'adr2' => 'required|max:50',
            'city' => 'required|max:50',
            'stae' => 'required|max:50',
            'post' => 'required|max:50',
            'ctry' => 'required|max:50',
        ];
    }
}
