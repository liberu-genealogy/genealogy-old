<?php

namespace App\Http\Controllers\Profile;

use App\Profile;
use Illuminate\Routing\Controller;
use App\Forms\Builders\ProfileForm;

class Edit extends Controller
{
    public function __invoke(Profile $profile, ProfileForm $form)
    {
        return ['form' => $form->edit($profile)];
    }
}
