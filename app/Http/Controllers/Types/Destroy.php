<?php

namespace App\Http\Controllers\Types;

use App\Models\Type;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Type $type)
    {
        $type->delete();

        return [
            'message' => __('The type was successfully deleted'),
            'redirect' => 'types.index',
        ];
    }
}
