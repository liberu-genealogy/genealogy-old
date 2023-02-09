<?php

namespace App\Broadcasting;

use App\Models\User;
use App\Models\ImportJob;

class Notification
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\Models\User  $user
     * @return array|bool
     */
    public function join(User $user)
    {
        //
    }
    /**
     * The user imports Gedcom progress
     * 
     * @param \App\Models\ImportJob
     * @return array|bool
     */
    public function import(ImportJob $job)
    {
        
    }
}
