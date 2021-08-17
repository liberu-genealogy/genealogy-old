<?php

namespace App\Jobs\Geneanum\Malta;

use App\Jobs\Geneanum\Sync;

class SyncBurials extends Sync
{
    protected const AREA = 'Malta';
    protected const DATABASE = 'Burials';
    protected const URL = 'https://static.geneanum.com/libs/grid/malte_sepulture.php?&_search=false&nd=%s&rows=100&page=%s&sidx=nom&sord=asc';

    /**
     * @inheritDoc
     */
    protected function getFields(array $row): array
    {
        [
            $date,
            $name,
            $first_name,
            $age,
            $father_first_name,
            $father_is_dead,
            $mother_name,
            $mother_first_name,
            $mother_is_dead,
            $spouse_name,
            $spouse_first_name,
            $spouse_dcd,
            $spouse_father_first_name,
            $spouse_father_is_dead,
            $spouse_mother_name,
            $spouse_mother_first_name,
            $spouse_mother_is_dead,
            $observation1,
            $observation2,
            $parish,
            $source,
        ] = $row['cell'];

        return [
            'date'                     => $date,
            'name'                     => $name,
            'first_name'               => $first_name,
            'age'                      => $age,
            'father_first_name'        => $father_first_name,
            'father_is_dead'           => $father_is_dead,
            'mother_name'              => $mother_name,
            'mother_first_name'        => $mother_first_name,
            'mother_is_dead'           => $mother_is_dead,
            'spouse_name'              => $spouse_name,
            'spouse_first_name'        => $spouse_first_name,
            'spouse_dcd'               => $spouse_dcd,
            'spouse_father_first_name' => $spouse_father_first_name,
            'spouse_father_is_dead'    => $spouse_father_is_dead,
            'spouse_mother_name'       => $spouse_mother_name,
            'spouse_mother_first_name' => $spouse_mother_first_name,
            'spouse_mother_is_dead'    => $spouse_mother_is_dead,
            'observation1'             => $observation1,
            'observation2'             => $observation2,
            'parish'                   => $parish,
            'source'                   => $source,
        ];
    }
}
