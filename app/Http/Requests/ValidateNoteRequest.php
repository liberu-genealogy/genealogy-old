<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateNoteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $note = $this->route('note');

        return [
            'name' => 'required|max:50',
            'description' => 'required|max:50',
            'date' => 'required|max:24',
            'type_id' => 'required|max:12',
            'is_active' => 'boolean',
        ];
    }
}
