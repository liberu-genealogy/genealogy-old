<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePersonLdsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $personlds = $this->route('personlds');

        return [

            'group' => 'required|max:50',
            'gid' => 'required|max:50',
            'type' => 'required|max:50',
            'stat' => 'required|max:50',
            'date' => 'required|max:50',
            'plac' => 'required|max:50',
            'temp' => 'required|max:50',
            'slac_famc' => 'required|max:50',
        ];
    }
}
