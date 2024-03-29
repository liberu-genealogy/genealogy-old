<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateChanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $this->route('chan');

        return [

            'group' => 'required|max:50',
            'gid' => 'required|max:50',
            'date' => 'required|max:50',
            'time' => 'required|max:50',
        ];
    }
}
