<?php

namespace App\Http\Controllers\Familyslugs;

use App\Models\FamilySlgs;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(FamilySlgs $familySlgs)
    {
        $familySlgs->delete();

        return [
            'message' => __('The family slgs was successfully deleted'),
            'redirect' => 'familyslugs.index',
        ];
    }
}
