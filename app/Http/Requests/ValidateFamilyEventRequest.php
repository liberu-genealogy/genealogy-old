<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFamilyEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $this->route('familyevent');

        return [
            'family_id' => '',
            'place_id' => '',
            'date' => 'required|max:50',
            'title' => 'required|max:50',
            'description' => 'required|max:50',
        ];
    }
}
