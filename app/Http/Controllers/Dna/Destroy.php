<?php

namespace App\Http\Controllers\Dna;

use App\Models\Dna;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke($id)
    {
        $user = auth()->user();
        $dna = Dna::find($id);
        if ($user->id === $dna->user_id) {
            $dna->delete();

            return [
                'message' => __('The dna was successfully deleted'),
                'redirect' => 'dna.index',
            ];
        }

        return [
            'message' => __('The dna could not be deleted'),
            'redirect' => 'dna.index',
        ];
    }
}
