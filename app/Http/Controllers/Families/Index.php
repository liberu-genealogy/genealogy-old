<?php

namespace App\Http\Controllers\Families;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Index extends Controller
{
    public function __invoke(Request $request)
    {
        return $this->getDabolvilleFormat();
    }

    public function getDabolvilleFormat(): string
    {
        //1 Progenitor - $husband married $woman $year $location
        //1.1 Child - $husband married $woman $year $location
        //1.1.1 Grandchild - $husband married $woman $year $location
        return 'true';
    }
}
