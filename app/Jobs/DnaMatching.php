<?php

namespace App\Jobs;

use App\Models\Dna;
use App\Models\DnaMatching as DM;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DnaMatching implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $current_user;
    protected $var_name;
    protected $file_name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($current_user, $var_name, $file_name)
    {
        $this->current_user = $current_user;
        $this->var_name = $var_name;
        $this->file_name = $file_name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->current_user;
        $dnas = Dna::where('variable_name', '!=', $this->var_name)->get();
        $mpath = app_path();
        foreach ($dnas as $dna) {
//            system('/usr/bin/python3 /home/genealogia/public_html/dna.py ' . $this->var_name . ' ' . $dna->variable_name . ' ' . '/home/genealogia/public_html/storage/app/dna/'. $this->file_name . ' ' . '/home/genealogia/public_html/storage/app/dna/'. $dna->file_name);
            // chdir('/home/familytree365/domains/api.familytree365.com/genealogy/app');
            chdir($mpath);
            exec('python3 dna.py '.$this->var_name.' '.$dna->variable_name.' '.$this->file_name.' '.$dna->file_name);
            $dm = new DM();
            $dm->user_id = $user->id;
            $dm->image = 'shared_dna_'.$this->var_name.'_'.$dna->variable_name.'.png';
            $dm->file1 = 'discordant_snps_'.$this->var_name.'_'.$dna->variable_name.'_GRCh37.csv';
            $dm->file2 = 'shared_dna_one_chrom_'.$this->var_name.'_'.$dna->variable_name.'_GRCh37.csv';
            $dm->save();

            $data = readCSV(storage_path('app'.DIRECTORY_SEPARATOR.'dna'.DIRECTORY_SEPARATOR.'output'.DIRECTORY_SEPARATOR.$dm->file1), ',');
            array_shift($data);
            $data = writeCSV(storage_path('app'.DIRECTORY_SEPARATOR.'dna'.DIRECTORY_SEPARATOR.'output'.DIRECTORY_SEPARATOR.$dm->file1), $data);

            $data = readCSV(storage_path('app'.DIRECTORY_SEPARATOR.'dna'.DIRECTORY_SEPARATOR.'output'.DIRECTORY_SEPARATOR.$dm->file2), ',');
            array_shift($data);

            $temp_data = $data;
            array_shift($temp_data);
            array_shift($temp_data);
            $total_cms = 0;
            $largest_cm = 0;
            foreach ($temp_data as $line) {
                if ($line[4] >= $largest_cm) {
                    $largest_cm = $line[4];
                }
                $total_cms = $total_cms + $line[4];
            }
            $dm->user_id = $user->id;
            $dm->total_shared_cm = $total_cms;
            $dm->largest_cm_segment = round($largest_cm, 2);
            $dm->save();

            $data = writeCSV(storage_path('app'.DIRECTORY_SEPARATOR.'dna'.DIRECTORY_SEPARATOR.'output'.DIRECTORY_SEPARATOR.$dm->file2), $data);
        }
    }
}
