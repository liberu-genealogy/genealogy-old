<?php

namespace App\Http\Controllers\Gedcom;

use App\Http\Controllers\Controller;
use App\Models\ImportJob;
use Auth;
use Illuminate\Http\Request;

class Progress extends Controller
{
    //
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $runningjob = ImportJob::orderby('id', 'DESC')->first();
        $slug = null;
        if ($runningjob != null) {
            $slug = $runningjob->slug;
        }
        $ret = [];
        $ret['slug'] = $slug;
        $ret['user'] = $user_id;

        return $ret;
    }
}
