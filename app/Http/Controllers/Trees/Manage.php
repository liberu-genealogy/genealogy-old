<?php

namespace App\Http\Controllers\Trees;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Manage extends Controller
{
    public function getOptions(Request $request)
    {
        $users = User::all();

        return json_encode($users);
    }
}
