<?php

namespace App\Http\Requests\enso\Roles;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\enso\Menus\Menu;

class ValidateRoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', $this->nameUnique()],
            'display_name' => 'required',
            'description' => 'nullable',
            'menu_id' => 'nullable|exists:menus,id',
        ];
    }

    public function withValidator($validator)
    {
        if ($this->chosenParentMenu()) {
            $validator->after(fn ($validator) => $validator->errors()
                ->add('menu_id', 'Parent menus cannot be set as role defaults'));
        }
    }

    protected function nameUnique()
    {
        return Rule::unique('roles', 'name')
            ->ignore(optional($this->route('role'))->id);
    }

    private function chosenParentMenu(): bool
    {
        return $this->filled('menu_id')
            && Menu::find($this->get('menu_id'))->has_children;
    }
}
