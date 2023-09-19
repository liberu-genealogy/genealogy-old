<?php

namespace App\Broadcasting;

use App\Models\ImportJob;
use App\Models\User;

class Notification
{
    /**
     * Authenticate the user's access to the channel.
     *
     * @return array|bool
     */
    public function join(User $user)
    {
    }

    /**
     * The user imports Gedcom progress.
     *
     * @param \App\Models\ImportJob
     * @return array|bool
     */
    public function import(ImportJob $job)
    {
    }
}
