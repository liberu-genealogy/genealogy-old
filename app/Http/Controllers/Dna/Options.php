<?php

namespace App\Http\Controllers\Addrs;

use App\Models\Addr;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Addr::class;

    protected $queryAttributes = ['adr1'];

    //public function query(Request $request)
    //{
    //    return Addr::query();
    //}
}
