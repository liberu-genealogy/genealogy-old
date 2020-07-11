<?php

namespace App\Http\Controllers\enso\core\Administration\User;

use App\Forms\Builders\enso\core\UserForm;
use App\Forms\Builders\enso\core\UserFormIndi;
use App\Models\User;
use Illuminate\Routing\Controller;
use App\Traits\ConnectionTrait;
use Auth;

class Edit extends Controller
{
    use ConnectionTrait;
    public function __invoke(User $user, UserForm $form)
    {
        $conn = $this->getConnection();
        if($conn === 'tenant') {
            $user = Auth::user();
            $form = new UserFormIndi();
            return ['form'=> $form->edit($user)];
        }
        return ['form' => $form->edit($user)];
    }
}
