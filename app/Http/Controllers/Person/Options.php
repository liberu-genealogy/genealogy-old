<?php

namespace App\Http\Controllers\Person;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use App\Http\Resources\Person as Resource;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Person::class;

    protected $queryAttributes = ['name','email'];

    // protected $resource = Resource::class;

    // public function query()
    // {
    //     return User::active()
    //         ->with(['person:id,appellative,name', 'avatar:id,user_id']);
    // }
}
