<?php

namespace App\Http\Controllers\enso\ActivityLog;

use Illuminate\Routing\Controller;
use App\Http\Response\enso\ActivityLog\Timeline;
class Index extends Controller
{
    public function __invoke(Timeline $timeline)
    {
        return $timeline;
    }
}