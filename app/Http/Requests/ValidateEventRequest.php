<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateEventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $event = $this->route('event');

        return [
            'description' => 'required|max:50',
            'date' => 'required|max:24',
            'is_active' => 'boolean',
            'event_type_id' => 'required|exists:event_types,id'
        ];
    }
}
