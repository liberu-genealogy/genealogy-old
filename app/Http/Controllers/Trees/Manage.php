<?php

namespace App\Http\Controllers\Trees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class Manage extends Controller
{
    public function getOptions(Request $request)
    {
        $users = User::all();
        return json_encode($users);
    }
}
