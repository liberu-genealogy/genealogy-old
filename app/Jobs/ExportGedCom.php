<?php

namespace App\Jobs;

use Auth;
use File;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use GenealogiaWebsite\LaravelGedcom\Utils\GedcomGenerator;

class ExportGedCom implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $family_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($family_id, Request $request)
    {
        //
        $this->family_id = $family_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $headers = [
            'Content-type' => 'text/txt',
        ];
        $p_id = 0;
        $f_id = $this->family_id;
        $up_nest = 3;
        $down_nest = 3;
        $writer = new GedcomGenerator($p_id, $f_id, $up_nest, $down_nest);
        $content = $writer->getGedcomPerson();
        // $user_id = Auth::user()->id;
        $ts = microtime(true);
        $file = env('APP_NAME').date('_Ymd_').$ts.'.GED';
        $destinationPath = public_path().'/upload/';
        if (! is_dir($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        File::put($destinationPath.$file, $content);

        return 0;
    }
}
