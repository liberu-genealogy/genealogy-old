<?php

namespace App\Forms\Builders\enso\Tutorials;

use LaravelEnso\Forms\Services\Form;
use App\Models\enso\Permissions\Permission;
use App\Models\enso\Tutorials\Tutorial;

class TutorialForm
{
    protected const FormPath = __DIR__.'/../../../Templates/enso/tutorials/tutorial.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = (new Form(static::FormPath))
            ->options('permission_id', Permission::get(['name', 'id']));
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Tutorial $tutorial)
    {
        return $this->form->edit($tutorial);
    }
}
