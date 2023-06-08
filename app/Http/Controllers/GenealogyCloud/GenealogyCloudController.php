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

        $response = $client->request('GET', $this->genealogyCloudRecordsApi, ['query' => [
            'name' => $request->name,
            'number_show' => $request->per_page, // 100
            'start' => ($request->per_page * $request->page) - $request->per_page, // 2,
        ],
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();
        $persons = json_decode($response->getBody(), true);

        return response()->json($persons);
    }
}
