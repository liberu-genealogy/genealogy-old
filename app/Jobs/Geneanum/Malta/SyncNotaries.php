<?php

namespace App\Jobs\Geneanum\Malta;

use App\Jobs\Geneanum\Sync;

class SyncNotaries extends Sync
{
    protected const AREA = 'Malta';
    protected const DATABASE = 'Notarial Acts';
    protected const URL = 'https://static.geneanum.com/libs/grid/malte_notaire.php?annee_limite=75&_search=false&nd=%s&rows=100&page=%s&sidx=famille&sord=asc';

    /**
     * @inheritDoc
     */
    protected function getFields(array $row): array
    {
        [
            $family,
            $number,
            $notary_name,
            $notary_first_name,
            $type,
            $date,
            $name_a,
            $first_name_a,
            $a_dead,
            $father_first_name_a,
            $father_dead_a,
            $mother_name_a,
            $mother_first_name_a,
            $mother_dead_a,
            $name_b,
            $first_name_b,
            $b_dead,
            $father_first_name_b,
            $father_dead_b,
            $mother_name_b,
            $mother_first_name_b,
            $mother_dead_b,
            $note1,
            $note2,
            $note3,
            $note4,
            $note5,
            $note6,
            $note7,
            $update,
        ] = $row['cell'];

        return [
            'family'              => $family,
            'number'              => $number,
            'notary_name'         => $notary_name,
            'notary_first_name'   => $notary_first_name,
            'type'                => $type,
            'date'                => $date,
            'name_a'              => $name_a,
            'first_name_a'        => $first_name_a,
            'a_dead'              => $a_dead,
            'father_first_name_a' => $father_first_name_a,
            'father_dead_a'       => $father_dead_a,
            'mother_name_a'       => $mother_name_a,
            'mother_first_name_a' => $mother_first_name_a,
            'mother_dead_a'       => $mother_dead_a,
            'name_b'              => $name_b,
            'first_name_b'        => $first_name_b,
            'b_dead'              => $b_dead,
            'father_first_name_b' => $father_first_name_b,
            'father_dead_b'       => $father_dead_b,
            'mother_name_b'       => $mother_name_b,
            'mother_first_name_b' => $mother_first_name_b,
            'mother_dead_b'       => $mother_dead_b,
            'note1'               => $note1,
            'note2'               => $note2,
            'note3'               => $note3,
            'note4'               => $note4,
            'note5'               => $note5,
            'note6'               => $note6,
            'note7'               => $note7,
            'update'              => $update,
        ];
    }
}
