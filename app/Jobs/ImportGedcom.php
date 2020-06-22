<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use ModularSoftware\LaravelGedcom\Utils\GedcomParser;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImportGedcom implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $filename;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filename)
    {
        //
        $this->filename = $filename;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $parser = new GedcomParser();
        $parser->parse(storage_path($this->filename), '', true);
        File::delete(storage_path($this->filename));
        return 0;
    }
}
