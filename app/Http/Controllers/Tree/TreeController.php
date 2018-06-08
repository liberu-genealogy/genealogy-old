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
        return $family = \DB::table('family_individual')->join('families', 'family_individual.individual_id', 'families.id')->where('family_individual.type_id', '>=' , 0)->select(\DB::raw("family_individual.individual_id as sid"), \DB::Raw("family_individual.family_id as tid"))->get('sid', 'tid');

    }

}