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

    public function links(Individual $individual)
    {
        return $individual->join('families', 'individuals.id', 'families.id')->select(\DB::Raw("individuals.id AS sid"), \DB::Raw("families.father_id AS tid"))->get(array('sid', 'tid'));
    }
}