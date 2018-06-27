<?php

namespace App\Http\Controllers\Tree;

use App\Http\Controllers\Controller;
use App\Individual;
use App\Family;

class TreeController extends Controller
{
    public function index(Individual $individual)
    {
        return $individual->get(['individuals.id', 'individuals.first_name', 'individuals.last_name']);
    }

    public function links()
    {
        return $individual = \DB::table('child_parent')->select(\DB::raw('child_id as sid'), (\DB::raw('parent_id as tid')))->get('sid', 'tid');
    }

    /**
     * Get fathers family
     *
     * @param  Integer $father_id [Father ID]
     * @return Array | Json
     */
    public function pedigree($father_id = 1)
    {
        $father = Family::with(['info','spouse'])->where('type_id','>=',1)->where('father_id',$father_id)->first();
        $data = [];
        if($father){
            $data[] = array(
                'name' => $father->info->getNameAttribute(),
                'class' => 'node',
                'textClass' => 'nodeText',
                'depthOffset' => 1,
                'marriages' => array(
                    ['spouse' => array(
                        'name' => $father->spouse->getNameAttribute()
                    ),
                        'children' => $father->info->children->map(function ($item) {
                            return ['name' => $item['first_name'].' '.$item['last_name']];
                        })->all()],

                ),
                'extra' => []
            );
        }


        return $data;

    }

    /**
     * Get individuals with its children
     *
     * @param  integer $parent_id [Parent ID / Father ID]
     * @param  integer $nest      [Set how many nested children]
     * @return Array | Json
     */
    public function show($parent_id = 1, $nest = 1){
        $this->nest = 1; // initialize nesting to 1

        $parents = Individual::where('is_active', 1)->where('id', $parent_id)->get();

        $tree = $this->getChildren($parents, (int)$nest);

        return $tree;
    }


    /**
     * Loop nested children
     *
     *
     * @param  integer $parents [description]
     * @param  integer $nest    [description]
     * @param  boolean $show    [description]
     * @return array           [description]
     */
    public function getChildren($parents = 1, $nest = 1, $show = true){
        $data = [];
        if($this->nest <= $nest){
            $this->nest++;

            foreach($parents as $key => $parent)
            {
                if($show === true){
                    $data[] = [
                        'id' => $parent->id,
                        'text' => $parent->getNameAttribute(),
                        'children' => $this->getChildren($parent->children,$nest,$show)
                    ];
                }else{
                    $data[] = [
                        'id' => $parent->id,
                        'name' => $parent->getNameAttribute(),
                        'children' => $this->getChildren($parent->children,$nest,$show)
                    ];
                }

            }
        }

        return $data;

    }

    /**
     * Get individuals with its children
     *
     * @param  integer $parent_id [Parent ID / Father ID]
     * @param  integer $nest      [Set how many nested children]
     * @return Array | Json
     */
    public function edge($parent_id = 1, $nest = 1){
        $this->nest = 1; // initialize nesting to 1

        $parents = Individual::where('is_active', 1)->where('id', $parent_id)->get();

        $tree = $this->getChildren($parents, (int)$nest, false);

        return $tree;
    }
}
