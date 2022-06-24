<?php

namespace App\Http\Controllers\Person;

use App\Models\Person;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Person $person)
    {
        $this->authorize('destroy', $person);

        $person->delete();

        return [
            'message' => __('The person was successfully deleted'),
            'redirect' => 'administration.people.index',
        ];
    }
}
