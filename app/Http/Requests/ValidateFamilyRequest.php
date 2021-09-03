<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFamilyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $family = $this->route('family');

        return [
            'is_active' => 'boolean',
            'description' => 'required|max:500',
            'husband_id' => 'required|exists:people,id',
            'wife_id' => 'required|exists:people,id',
            // 'child_id' => 'required|exists:people,id',
            'type_id' => 'required|exists:types,id',
        ];
    }
}
