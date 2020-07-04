<?php

namespace App\Http\Controllers\enso\core\Administration\User;

use Illuminate\Routing\Controller;
use LaravelEnso\Core\Http\Resources\User as Resource;
use LaravelEnso\Core\Models\User;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $queryAttributes = ['email', 'person.name', 'person.appellative'];

    protected $resource = Resource::class;

    public function query()
    {
        return User::active()
            ->with(['person:id,appellative,name', 'avatar:id,user_id']);
    }
}
