<?php

namespace App\Http\Controllers\Addresses;

use App\Addr;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateAddrRequest;

class Update extends Controller
{
    public function __invoke(ValidateAddrRequest $request, Addr $addr)
    {
        $addr->update($request->validated());

        return ['message' => __('The addr was successfully updated')];
    }
}
