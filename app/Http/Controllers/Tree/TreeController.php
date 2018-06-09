<?php

namespace App\Http\Controllers\Tree;

use App\Individual;
use App\Http\Controllers\Controller;

class TreeController extends Controller
{
    public function index(Individual $individual)
    {
        return $individual->get(array('individuals.id', 'individuals.first_name', 'individuals.last_name'));
    }

    public function links()
    {
       return $individual = \DB::table('child_parent')->select(\DB::raw('child_id as sid'), (\DB::raw('parent_id as tid')))->get('sid', 'tid');
    }
}
