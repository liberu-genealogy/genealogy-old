<?php

namespace App\Jobs\Geneanum\Tunisia;

use App\Jobs\Geneanum\Sync;

class SyncMarriages extends Sync
{
    protected const AREA = 'Tunisia';
    protected const DATABASE = 'Marriages';
    protected const URL = 'https://static.geneanum.com/libs/grid/tunisie_mariage.php?annee_limite=75&_search=false&nd=%s&rows=100&page=%s&sidx=nom_epoux&sord=asc';

    /**
     * @inheritDoc
     */
    protected function getFields(array $row): array
    {
        [
            $photos,
            $civil_date,
            $town,
            $date,
            $parish,
            $husband_name,
            $husband_first_name,
            $husband_father_first_name,
            $husband_mother_name,
            $husband_mother_first_name,
            $wife_name,
            $wife_first_name,
            $wife_father_first_name,
            $wife_mother_name,
            $wife_mother_first_name,
            $index,
            $observation,
        ] = $row['cell'];

        return [
            'photos' => $photos,
            'civil_date' => $civil_date,
            'town' => $town,
            'date' => $date,
            'parish' => $parish,
            'husband_name' => $husband_name,
            'husband_first_name' => $husband_first_name,
            'husband_father_first_name' => $husband_father_first_name,
            'husband_mother_name' => $husband_mother_name,
            'husband_mother_first_name' => $husband_mother_first_name,
            'wife_name' => $wife_name,
            'wife_first_name' => $wife_first_name,
            'wife_father_first_name' => $wife_father_first_name,
            'wife_mother_name' => $wife_mother_name,
            'wife_mother_first_name' => $wife_mother_first_name,
            'index' => $index,
            'observation' => $observation,
        ];
    }
}
