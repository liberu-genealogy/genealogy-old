<?php

namespace App\Http\Controllers\Tree;

use App\Family;
use App\Individual;
use App\Http\Controllers\Controller;

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
     * Get fathers family.
     *
     * @param int $father_id [Father ID]
     *
     * @return array | Json
     */
    public function pedigree($father_id = 1)
    {
        $father = Family::with(['info', 'spouse'])->where('type_id', '>=', 1)->where('father_id', $father_id)->first();
        $data = [];
        if ($father) {
            $data[] = [
                'name' => $father->info->getNameAttribute(),
                'class' => 'node',
                'textClass' => 'nodeText',
                'depthOffset' => 1,
                'marriages' => [
                    ['spouse' => [
                        'name' => $father->spouse->getNameAttribute(),
                    ],
                        'children' => $father->info->children->map(function ($item) {
                            return ['name' => $item['first_name'].' '.$item['last_name']];
                        })->all(), ],

                ],
                'extra' => [],
            ];
        }

        return $data;
    }

    /**
     * Get individuals with its children.
     *
     * @param int $parent_id [Parent ID / Father ID]
     * @param int $nest      [Set how many nested children]
     *
     * @return array | Json
     */
    public function show($parent_id = 1, $nest = 1)
    {
        $this->nest = 1; // initialize nesting to 1

        $parents = Individual::where('is_active', 1)->where('id', $parent_id)->get();

        $tree = $this->getChildren($parents, (int) $nest);

        return $tree;
    }

    /**
     * Loop nested children.
     *
     *
     * @param int  $parents [description]
     * @param int  $nest    [description]
     * @param bool $show    [description]
     *
     * @return array [description]
     */
    public function getChildren($parents = 1, $nest = 1, $show = true)
    {
        $data = [];
        if ($this->nest <= $nest) {
            $this->nest++;

            foreach ($parents as $key => $parent) {
                if ($show === true) {
                    $data[] = [
                        'id' => $parent->id,
                        'text' => $parent->getNameAttribute(),
                        'children' => $this->getChildren($parent->children, $nest, $show),
                    ];
                } else {
                    $data[] = [
                        'id' => $parent->id,
                        'name' => $parent->getNameAttribute(),
                        'children' => $this->getChildren($parent->children, $nest, $show),
                    ];
                }
            }
        }

        return $data;
    }

    /**
     * Get individuals with its children.
     *
     * @param int $parent_id [Parent ID / Father ID]
     * @param int $nest      [Set how many nested children]
     *
     * @return array | Json
     */
    public function edge($parent_id = 1, $nest = 1)
    {
        $this->nest = 1; // initialize nesting to 1

        $parents = Individual::where('is_active', 1)->where('id', $parent_id)->get();

        $tree = $this->getChildren($parents, (int) $nest, false);

        $this->linkData = [];
        $link = $this->edgeLink($tree[0]['id'], $tree[0]['children']);

        $data['tree'] = $tree;
        $data['links'] = $link;

        return $data;
    }

    public function edgeLink($currentID, $children)
    {
        foreach ($children as $key => $value) {
            $this->linkData[] = [
                'source' => $currentID,
                'target' => $value['id'],
                'type' => rand(1, 2),
            ];

            $this->edgeLink($value['id'], $value['children']);
        }

        return $this->linkData;
    }
}
