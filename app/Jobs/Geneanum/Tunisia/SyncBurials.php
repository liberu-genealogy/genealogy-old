<?php

namespace App\Jobs\Geneanum\Tunisia;

use App\Jobs\Geneanum\Sync;

class SyncBurials extends Sync
{
    protected const AREA = 'Tunisia';
    protected const DATABASE = 'Burials';
    protected const URL = 'https://static.geneanum.com/libs/grid/tunisie_sepulture.php?&_search=false&nd=%s&rows=100&page=%s&sidx=nom&sord=asc';

    /**
     * @inheritDoc
     */
    protected function getFields(array $row): array
    {
        [
            $photos,
            $death_date,
            $town,
            $burial_date,
            $parish,
            $name,
            $first_name,
            $father_first_name,
            $mother_name,
            $mother_first_name,
            $spouse_name,
            $index,
            $observation,
        ] = $row['cell'];

        return [
            'photos'            => $photos,
            'death_date'        => $death_date,
            'town'              => $town,
            'burial_date'       => $burial_date,
            'parish'            => $parish,
            'name'              => $name,
            'first_name'        => $first_name,
            'father_first_name' => $father_first_name,
            'mother_name'       => $mother_name,
            'mother_first_name' => $mother_first_name,
            'spouse_name'       => $spouse_name,
            'index'             => $index,
            'observation'       => $observation,
        ];
    }
}
