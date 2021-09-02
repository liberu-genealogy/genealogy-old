<?php

namespace App\Http\Controllers\Families;

use App\Models\Family;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Family $family)
    {
        $family->delete();

        return [
            'message' => __('The family was successfully deleted'),
            'redirect' => 'families.index',
        ];
    }
}
