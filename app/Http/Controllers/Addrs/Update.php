<?php

namespace App\Http\Controllers\Addrs;

use App\Models\Addr;
use App\Http\Requests\ValidateAddrRequest;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateAddrRequest $request, Addr $addr)
    {
        $addr->update($request->validated());

        return ['message' => __('The addr was successfully updated')];
    }
}
