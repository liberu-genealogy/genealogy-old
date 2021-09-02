<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateMediaObjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $mediaobjects = $this->route('mediaobjects');

        return [
            'gid' => 'required|max:50',
            'titl' => 'required|max:50',
            'rin' => 'required|max:50',
            // 'form' => 'required|max:50',
            // 'blob' => 'required|max:50',
            // 'file' => 'required|max:50',
        ];
    }
}
