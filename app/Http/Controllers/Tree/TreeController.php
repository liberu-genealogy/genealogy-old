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

    public function links(Individual $individual)
    {
        //   return $family = \DB::table('family_individual')->where('family_individual.type_id', '>=' , 1)->select(\DB::raw("family_individual.family_id as sid"), \DB::Raw("family_individual.individual_id as tid"))->get('sid', 'tid');


        /**
         * return $family = \DB::table('family_individual')
         * ->leftJoin('individuals AS parents', function ($join) {
         * $join->on('parents.id', '=', 'family_individual.individual_id')
         * ->where('family_individual.type_id', '>=', 1);
         * })
         * ->leftJoin('families', function ($join) {
         * $join->on('families.id', '=', 'parents.id')
         * ->where('families.type_id', '>=', 0);
         * })
         * ->leftJoin('individuals AS children', function ($join) {
         * $join->on('children.id', '=', 'family_individual.individual_id')
         * ->where('family_individual.type_id', '=', 0);
         * })
         * ->leftJoin('family_individual AS family_tid', function ($join) {
         * $join->on('family_tid.family_id', '=', 'parents.id')
         * ->where('families.father_id', '=>', 'parents.id')
         * ->orWhere('families.mother_id', '=>', 'parents.id');
         * })
         * ->select(\DB::raw("children.id as tid"), \DB::raw("children.id as sid"))->get('tid, sid');
         **/

//        return $family->individuals()->select('individual_id')->get('individual_id');
//        return $individual->parents()->select(\DB::raw("child_parent.child_id as sid", \DB::raw("child_parent.parent_id as tid")))->get('sid','tid');
          return $individual = \DB::table('child_parent')->select(\DB::raw("child_id as sid"), (\DB::raw("parent_id as tid")))->get('sid','tid');


    }

}