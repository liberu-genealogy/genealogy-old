<?php

namespace App\Http\Controllers\NationalArch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NationalArchController extends Controller
{
    private $nationalArchRecordsApi;

    public function __construct()
    {
        $this->nationalArchRecordsApi = config('services.nationalarch.api.records');
    }

    public function searchPerson(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', $this->nationalArchRecordsApi, [
            'query' => [
                'sps.firstName' => $request->firstName,
                'sps.lastName' => $request->lastName,
                'sps.searchQuery' => "and"
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();
        $persons = json_decode($response->getBody(), true);

        return response()->json($persons);
    }
}
