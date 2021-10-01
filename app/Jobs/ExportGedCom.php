<?php

namespace App\Jobs;

use Auth;
use FamilyTree365\LaravelGedcom\Utils\GedcomGenerator;
use File;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExportGedCom implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $p_id = 0;
        $f_id = 1;
        $up_nest = 3;
        $down_nest = 3;
        $writer = new GedcomGenerator($p_id, $f_id, $up_nest, $down_nest);
        $content = $writer->getGedcomPerson();
        $destinationPath = storage_path('public/upload/');

        // if (! is_dir($destinationPath)) {
        //     mkdir($destinationPath, 0777, true);
        // }

        \Storage::disk('public')->put($this->file, $content);
    }
}
