<?php

namespace App\Console\Commands;

use App\Jobs\Geneanum\Malta\SyncBaptisms as SyncMaltaBaptisms;
use App\Jobs\Geneanum\Malta\SyncBurials as SyncMaltaBurials;
use App\Jobs\Geneanum\Malta\SyncCensus as SyncMaltaCensus;
use App\Jobs\Geneanum\Malta\SyncMarriages as SyncMaltaMarriages;
use App\Jobs\Geneanum\Malta\SyncNotaries as SyncMaltaNotaries;
use App\Jobs\Geneanum\Malta\SyncPassports as SyncMaltaPassports;
use App\Jobs\Geneanum\Sync;
use App\Jobs\Geneanum\Tunisia\SyncBirthsNBaptisms as SyncTunisiaBirthsNBaptisms;
use App\Jobs\Geneanum\Tunisia\SyncBurials as SyncTunisiaBurials;
use App\Jobs\Geneanum\Tunisia\SyncMarriages as SyncTunisiaMarriages ;
use Illuminate\Console\Command;

class SyncWithGeneanum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'geneanum:sync {--test=false}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync with geneanum database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $is_testing = $this->option('test') !== 'false';

        Sync::$is_testing = $is_testing;

        dispatch(new SyncMaltaBaptisms());
        dispatch(new SyncMaltaBurials());
        dispatch(new SyncMaltaCensus());
        dispatch(new SyncMaltaMarriages());
        dispatch(new SyncMaltaNotaries());
        dispatch(new SyncMaltaPassports());
        dispatch(new SyncTunisiaBirthsNBaptisms());
        dispatch(new SyncTunisiaBurials());
        dispatch(new SyncTunisiaMarriages());

        return 0;
    }
}
