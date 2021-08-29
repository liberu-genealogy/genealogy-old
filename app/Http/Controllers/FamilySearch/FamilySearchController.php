<?php

namespace App\Http\Controllers\FamilySearch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FamilySearchController extends Controller
{
    private $familySearchRecordsApi;

    public function __construct()
    {
        $this->familySearchRecordsApi = config('services.familysearch.api.records');
    }

    public function searchPerson(Request $request)
    {
        $apiToken = $request->apiToken;

        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->request('GET', $this->familySearchRecordsApi.'/search', [
                'headers' => [
                    'Authorization' => 'Bearer '.$apiToken,
                    'Accept' => 'application/x-gedcomx-atom+json',
                ],
                'query' => [
                    'q.givenName' => $request->givenName,
                    'q.surname' => $request->surname,
                    'q.sex' => $request->sex,
                    'q.deathLikeDate.from' => $request->deathLikeDate_from,
                    'q.deathLikeDate.to' => $request->deathLikeDate_to,
                    'q.fatherGivenName' => $request->fatherGivenName,
                    'q.fatherSurname' => $request->fatherSurname,
                    'q.motherGivenName' => $request->motherGivenName,
                    'q.motherSurname' => $request->motherSurname,
                    'q.motherBirthLikePlace' => $request->motherBirthLikePlace,
                    'offset' => $request->offest,
                    'count' => $request->count,
                ],
            ]);

            $statusCode = $response->getStatusCode();
            $content = $response->getBody();
            $result = json_decode($response->getBody(), true);

            return response()->json($result);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $result = json_decode($response->getBody(), true);

            return response()->json($result);
        }
    }
}
