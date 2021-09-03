<?php

namespace App\Http\Controllers\Users;

use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;
// use App\Http\Resources\User as Resource;
use App\Models\User;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = User::class;

    protected $queryAttributes = ['email'];

    // protected $resource = Resource::class;

    // public function query()
    // {
    //     return User::active()
    //         ->with(['person:id,appellative,name', 'avatar:id,user_id']);
    // }
}
