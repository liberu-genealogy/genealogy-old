<?php

namespace App\Jobs\Geneanum\Malta;

use App\Jobs\Geneanum\Sync;

class SyncPassports extends Sync
{

    protected const AREA = 'Malta';
    protected const DATABASE = 'Passports';
    protected const URL = 'https://static.geneanum.com/libs/grid/malte_passeport.php?annee_limite=75&_search=false&nd=%s&rows=100&page=%s&sidx=nom&sord=asc';

    /**
     * @inheritDoc
     */
    protected function getFields(array $row): array
    {
        [
            $dead,
            $first_name,
            $last_name,
            $dad,
            $dcd,
            $husband,
            $dcd2,
            $date_of_birth,
            $birth,
            $age,
            $job,
            $residence,
            $destination,
            $can_read,
            $obs,
            $index,
            $no,
        ] = $row['cell'];

        return [
            'dead'          => $dead,
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'dad'           => $dad,
            'dcd'           => $dcd,
            'husband'       => $husband,
            'dcd2'          => $dcd2,
            'date_of_birth' => $date_of_birth,
            'birth'         => $birth,
            'age'           => $age,
            'job'           => $job,
            'residence'     => $residence,
            'destination'   => $destination,
            'can_read'      => $can_read,
            'obs'           => $obs,
            'index'         => $index,
            'no'            => $no,
        ];
    }
}
