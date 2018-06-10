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

    public function pedigree(Individual $individual)
    {
        return $individual = \DB::table('family_individual')->where('family_individual.type_id', '>=' , 1)->select(\DB::raw("family_individual.family_id as sid"), \DB::Raw("family_individual.individual_id as tid"))->get('sid', 'tid');

    }
}
