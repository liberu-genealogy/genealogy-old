<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePersonEventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $personevent = $this->route('personevent');

        return [

            'title' => 'required|max:50',
            'description' => 'required|max:50',
            'date' => 'required|max:50',
        ];
    }
}
