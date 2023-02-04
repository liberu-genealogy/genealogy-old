<?php

namespace App\Http\Controllers\Dna;

use App\Jobs\DnaMatching;
use App\Models\Dna;
use App\Traits\UniqueStringTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    use UniqueStringTrait;

    public function __invoke(Request $request)
    {
        $role = \Auth::user()->role_id;
	$user_id = \Auth::user()->id;
        $dna = Dna::where('user_id', '=', $user_id)->count();

        if (in_array($role, [1, 2, 9, 10])) {
            $allowed =  TRUE;
        }
        if (in_array($role, [4, 5, 6]) && $dna < 1) {
	    $allowed  = TRUE;
        }

        if (in_array($role, [7, 8]) && $dna < 5) {
            $allowed = TRUE;
        }

	if ($allowed == TRUE) {
	
        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                try {
                    $currentUser = Auth::user();
                    $file_name = 'dna_'.$request->file('file')->getClientOriginalName().uniqid().'.'.$request->file('file')->extension();
                    $request->file->storeAs('dna', $file_name);
                    define('STDIN', fopen('php://stdin', 'r'));
                    $random_string = $this->unique_random('dnas', 'name', 5);
                    $var_name = 'var_'.$random_string;
                    $filename = 'app/dna/'.$file_name;
                    $user_id = $currentUser->id;
                    $dna = new Dna();
                    $dna->name = 'DNA Kit for user '.$user_id;
                    $dna->user_id = $user_id;
                    $dna->variable_name = $var_name;
                    $dna->file_name = $file_name;
                    $dna->save();
                    DnaMatching::dispatch($currentUser, $var_name, $file_name);

                    return [
                        'message' => __('The dna was successfully created'),
                        'redirect' => 'dna.edit',
                        'param' => ['dna' => $dna->id],
                    ];

                } catch (\Exception $e) {
                    return $e->getMessage();
                }
            }

            return ['File corrupted'];
        }

        return response()->json(['Not uploaded'], 422);
    }

}
}
