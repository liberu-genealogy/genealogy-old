<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateIndividualRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $individual = $this->route('individual');

        return [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'is_active' => 'boolean',
            'event_id' => 'required|exists:events,id',
        ];
    }
}
