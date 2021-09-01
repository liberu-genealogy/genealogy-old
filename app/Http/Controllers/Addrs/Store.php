<?php

namespace App\Http\Controllers\Addrs;

use App\Http\Requests\ValidateAddrRequest;
use App\Models\Addr;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateAddrRequest $request, Addr $addr)
    {
        $addr->fill($request->validated())->save();

        return [
            'message' => __('The addr was successfully created'),
            'redirect' => 'addrs.edit',
            'param' => ['addr' => $addr->id],
        ];
    }
}
