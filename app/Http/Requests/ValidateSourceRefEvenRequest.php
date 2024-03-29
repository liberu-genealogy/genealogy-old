<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSourceRefEvenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $this->route('sourcerefeven');

        return [

            'group' => 'required|max:50',
            'gid' => 'required|max:50',
            'even' => 'required|max:50',
            'role' => 'required|max:50',
        ];
    }
}
