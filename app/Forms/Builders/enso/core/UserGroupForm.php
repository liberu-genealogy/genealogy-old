<?php

namespace App\Forms\Builders\enso\core;

use App\Models\enso\core\UserGroup;
use LaravelEnso\Forms\Services\Form;

class UserGroupForm
{
    protected const TemplatePath = __DIR__.'/../../../Templates/enso/core/userGroup.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = (new Form(self::TemplatePath));
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(UserGroup $userGroup)
    {
        return $this->form->edit($userGroup);
    }
}
