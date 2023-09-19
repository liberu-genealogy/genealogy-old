<?php

namespace App\Http\Controllers\GenealogyCloud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenealogyCloudController extends Controller
{
    private $genealogyCloudRecordsApi;

    public function __construct()
    {
        $this->genealogyCloudRecordsApi = config('services.genealogycloud.api.records');
    }

    public function searchPerson(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', $this->genealogyCloudRecordsApi, [
            'query' => [
                'Sessionid' => 'f11kgk5olvzoupjjkxex3xed',
                'Surname' => $request->Surname ?: '',
                'GivenNames' => $request->GivenNames,
                'MaxRows' => 100,

            ],
        ]);

        $response->getStatusCode();
        $response->getBody();
        $persons = json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);

        return response()->json($persons);
    }
}
