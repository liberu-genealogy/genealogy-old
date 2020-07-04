<?php

namespace App\Http\Controllers\enso\Teams;

use Illuminate\Routing\Controller;
use LaravelEnso\Teams\Http\Requests\ValidateTeamRequest;
use App\Http\Resources\enso\Teams\Team as Resource;
use App\Models\enso\Teams\Team;

class Store extends Controller
{
    public function __invoke(ValidateTeamRequest $request)
    {
        $team = Team::updateOrCreate(
            ['id' => $request->get('id')],
            ['name' => $request->get('name')]
        );

        $team->updateMembers($request->get('userIds'));

        return [
            'message' => __('The team was successfully saved'),
            'team' => new Resource($team->load(['users.person', 'users.avatar'])),
        ];
    }
}
