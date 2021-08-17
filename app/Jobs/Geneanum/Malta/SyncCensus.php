<?php

namespace App\Jobs\Geneanum\Malta;

use App\Jobs\Geneanum\Sync;

class SyncCensus extends Sync
{
    protected const AREA = 'Malta';
    protected const DATABASE = 'Censuses';
    protected const URL = 'https://static.geneanum.com/libs/grid/malte_recensement.php?annee_limite=75&_search=false&nd=%s&rows=100&page=%s&sidx=paroisse&sord=asc';

    /**
     * @inheritDoc
     */
    protected function getFields(array $row): array
    {
        [
            $order_no,
            $parish,
            $year,
            $family_no,
            $last_name,
            $first_name,
            $age,
            $observation1,
            $inferred_birth,
            $observation2,
            $observation3,
            $source,
        ] = $row['cell'];

        return [
            'order_no'       => $order_no,
            'parish'         => $parish,
            'year'           => $year,
            'family_no'      => $family_no,
            'first_name'     => $first_name,
            'last_name'      => $last_name,
            'age'            => $age,
            'observation1'   => $observation1,
            'inferred_birth' => $inferred_birth,
            'observation2'   => $observation2,
            'observation3'   => $observation3,
            'source'         => $source,
        ];
    }
}
