<?php

namespace App\Jobs;

use FamilyTree365\LaravelGedcom\Utils\GedcomGenerator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Family;
use App\Tenant\Manager;
use App\Models\Person;
use Illuminate\Support\Facades\Log;

class ExportGedCom implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;
    protected User $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file, User $user)
    {
        $this->file = $file;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $p_id = $this->user->person_id; // person_id
        $f_id = 0;                      // family_id

        $tenant = Manager::fromModel($this->user->company(), $this->user);
        $tenant->connect();

        $family = Family::where("husband_id", $this->user->id)
                ->orWhere("wife_id", $this->user->id)
                ->first();

        if ($family == null) {
            $person = Person::where("child_in_family_id", $this->user->id)->first();

            if ($persons != null) {
                $f_id=$person->child_in_family_id;
            } else {
                $f_id = 0;
            }

        } else {
            $f_id = $family->id;
        }

        Log::info("Family Id => $f_id \n Person Id => $p_id");
      
        $up_nest = 3; 
        $down_nest = 3;

        $writer = new GedcomGenerator($p_id, $f_id, $up_nest, $down_nest);
        $content = $writer->getGedcomPerson();

        Log::info("content from getGedcomPerson function => \n $content");

        \Storage::disk('local')->put($this->file, $content);
    }
}
