<?php

namespace App\Http\Controllers\Tree;

use App\Individual;
use App\Family;
use App\Http\Controllers\Controller;

class TreeController extends Controller
{
    public function index(Individual $individual)
    {
        return $individual->get(array('individuals.id', 'individuals.first_name', 'individuals.last_name'));
    }

    public function links(Family $family)
    {
        return $family = \DB::table('family_individual')->select(\DB::raw("family_individual.family_id as sid"), \DB::Raw("family_individual.individual_id as tid"))->get('sid', 'tid');

    }

}