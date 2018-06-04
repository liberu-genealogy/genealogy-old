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
            'event_id' => 'required|exists:events,id',
            'individual_id_1' => 'required|exists:individuals,id',
            'individual_id_2' => 'required|exists:individuals,id',
        ];
    }
}
