<?php

namespace App\Http\Controllers\enso\teams;

use Illuminate\Routing\Controller;
use Laravelenso\teams\Http\Requests\ValidateTeamRequest;
use App\Http\Resources\enso\teams\Team as Resource;
use App\Models\enso\teams\Team;

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
