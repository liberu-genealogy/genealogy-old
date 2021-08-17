<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpenArchController extends Controller
{
    private $openArchRecordsApi;

    public function __construct()
    {
        $this->openArchRecordsApi = config('services.openarch.api.records');
    }

    public function searchPerson(Request $request)
    {

        $authCode = $request->authcode;
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', $this->openArchRecordsApi . "/search.json", ['query' => [
            'name' => $request->name,
            'number_show' => $request->per_page, // 100
            'start' => ($request->per_page*$request->page) - $request->per_page, // 2,
        ]]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();
        $persons = json_decode($response->getBody(), true);

        return response()->json($persons);
    }
}
