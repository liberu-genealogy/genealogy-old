<?php

namespace App\Jobs\Geneanum\Malta;

use App\Jobs\Geneanum\Sync;

class SyncMarriages extends Sync
{
    protected const AREA = 'Malta';
    protected const DATABASE = 'Marriages';
    protected const URL = 'https://static.geneanum.com/libs/grid/malte_mariage.php?annee_limite=75&_search=false&nd=%s&rows=100&page=%s&sidx=date_union_en&sord=asc';

    /**
     * @inheritDoc
     */
    protected function getFields(array $row): array
    {
        [
            $date,
            $husband_name,
            $husband_first_name,
            $husband_father_first_name,
            $husband_father_dead,
            $husband_mother_name,
            $husband_mother_first_name,
            $husband_mother_dead,
            $wife_name,
            $wife_first_name,
            $wife_father_first_name,
            $wife_father_dead,
            $wife_mother_name,
            $wife_mother_first_name,
            $wife_mother_dead,
            $husband_obs,
            $wife_obs,
            $marriage_obs,
            $husband_parent_obs,
            $wife_parent_obs,
            $parish,
            $source,
            $update,
            $film,
            $photos,
        ] = $row['cell'];

        return [
            'date'                      => $date,
            'husband_name'              => $husband_name,
            'husband_first_name'        => $husband_first_name,
            'husband_father_first_name' => $husband_father_first_name,
            'husband_father_dead'       => $husband_father_dead,
            'husband_mother_name'       => $husband_mother_name,
            'husband_mother_first_name' => $husband_mother_first_name,
            'husband_mother_dead'       => $husband_mother_dead,
            'wife_name'                 => $wife_name,
            'wife_first_name'           => $wife_first_name,
            'wife_father_first_name'    => $wife_father_first_name,
            'wife_father_dead'          => $wife_father_dead,
            'wife_mother_name'          => $wife_mother_name,
            'wife_mother_first_name'    => $wife_mother_first_name,
            'wife_mother_dead'          => $wife_mother_dead,
            'husband_obs'               => $husband_obs,
            'wife_obs'                  => $wife_obs,
            'marriage_obs'              => $marriage_obs,
            'husband_parent_obs'        => $husband_parent_obs,
            'wife_parent_obs'           => $wife_parent_obs,
            'parish'                    => $parish,
            'source'                    => $source,
            'update'                    => $update,
            'film'                      => $film,
            'photos'                    => $photos,
        ];
    }
}
