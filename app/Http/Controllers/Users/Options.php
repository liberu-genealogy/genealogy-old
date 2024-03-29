<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Routing\Controller;
// use App\Http\Resources\User as Resource;
use LaravelLiberu\Select\Traits\OptionsBuilder;

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
