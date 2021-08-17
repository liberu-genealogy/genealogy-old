<?php

namespace App\Jobs\Geneanum\Tunisia;

use App\Jobs\Geneanum\Sync;

class SyncBirthsNBaptisms extends Sync
{
    protected const AREA = 'Tunisia';
    protected const DATABASE = 'Catholic Births and Baptisms';
    protected const URL = 'https://static.geneanum.com/libs/grid/tunisie_bapteme.php?annee_limite=75&_search=false&nd=%s&rows=100&page=%s&sidx=nom&sord=asc';

    /**
     * @inheritDoc
     */
    protected function getFields(array $row): array
    {
        [
            $pictures,
            $date_of_birth,
            $town_hall,
            $baptism_date,
            $parish,
            $last_name,
            $first_name,
            $father_first_name,
            $mother_name,
            $mother_first_name,
            $directory,
            $observation,
        ] = $row['cell'];

        return [
            'pictures'          => $pictures,
            'date_of_birth'     => $date_of_birth,
            'town_hall'         => $town_hall,
            'baptism_date'      => $baptism_date,
            'parish'            => $parish,
            'last_name'         => $last_name,
            'first_name'        => $first_name,
            'father_first_name' => $father_first_name,
            'mother_name'       => $mother_name,
            'mother_first_name' => $mother_first_name,
            'directory'         => $directory,
            'observation'       => $observation,
        ];
    }
}
