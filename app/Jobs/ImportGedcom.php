<?php

namespace App\Jobs;

use App\Events\GedComProgressSent;
use App\ImportJob;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use GenealogiaWebsite\LaravelGedcom\Utils\GedcomParser;
use Illuminate\Support\Facades\Artisan;

class ImportGedcom implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $filename;
    protected $slug;
    protected $user_id;
    protected $conn;
    protected $db;
    public $tries = 1;
    public $timeout = 0;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filename, $slug, $user_id, $conn, $db)
    {
        //
        $this->filename = $filename;
        $this->slug = $slug;
        $this->user_id = $user_id;
        $this->conn = $conn;
        $this->db = $db;
        $this->queue = 'high';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // add import job
        $slug = $this->slug;
        $user_id = $this->user_id;
        $status = 'queue';


        if($this->conn === 'tenant') {
            $key = 'database.connections.tenant.database';
            $value = $this->db;
            config([$key => $value]);
        }

        ImportJob::on($this->conn)->create(compact('user_id', 'slug', 'status'));

        $parser = new \GenealogiaWebsite\LaravelGedcom\Utils\GedcomParser();
        $parser->parse($this->conn, storage_path($this->filename), $slug, true);
        File::delete(storage_path($this->filename));


        // update import job
        $status = 'complete';
        ImportJob::on($this->conn)->where('slug', $slug)->where('user_id', $user_id)->update(compact('status'));

        return 0;
    }
}
