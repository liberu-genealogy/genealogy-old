<?php

namespace App\Jobs\Geneanum\Malta;

use App\Jobs\Geneanum\Sync;

class SyncBaptisms extends Sync
{
    protected const AREA = 'Malta';
    protected const DATABASE = 'Baptisms';
    protected const URL = 'https://static.geneanum.com/libs/grid/malte_bapteme.php?annee_limite=75&_search=false&nd=%s&rows=100&page=%s&sidx=Nom_Baptise&sord=asc';

    /**
     * @inheritDoc
     */
    protected function getFields(array $row): array
    {
        [
            $date,
            $name,
            $first_name,
            $sex,
            $father_first_name,
            $father_is_dead,
            $mother_name,
            $mother_first_name,
            $mother_is_dead,
            $observation1,
            $observation2,
            $observation3,
            $observation4,
            $officer,
            $parish,
            $source,
            $update,
        ] = $row['cell'];

        return [
            'date'              => $date,
            'name'              => $name,
            'first_name'        => $first_name,
            'sex'               => $sex,
            'father_first_name' => $father_first_name,
            'father_is_dead'    => $father_is_dead,
            'mother_name'       => $mother_name,
            'mother_first_name' => $mother_first_name,
            'mother_is_dead'    => $mother_is_dead,
            'observation1'      => $observation1,
            'observation2'      => $observation2,
            'observation3'      => $observation3,
            'observation4'      => $observation4,
            'officer'           => $officer,
            'parish'            => $parish,
            'source'            => $source,
            'update'            => $update,
        ];
    }
}
