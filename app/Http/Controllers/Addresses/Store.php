<?php

namespace App\Http\Controllers\Addresses;

use App\Addr;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateAddrRequest;

class Store extends Controller
{
    public function __invoke(ValidateAddrRequest $request, Addr $addr)
    {
        $addr->fill($request->validated())->save();

        return [
            'message' => __('The addr was successfully created'),
            'redirect' => 'addresses.edit',
            'param' => ['addr' => $addr->id],
        ];
    }
}
