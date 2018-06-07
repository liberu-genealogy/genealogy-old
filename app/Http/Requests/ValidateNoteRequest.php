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
            'description' => 'required|max:50',
            'date' => 'required|max:24',
            'is_active' => 'boolean',
        ];
    }
}
