<?php

namespace App\Http\Controllers\Geneanum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneanumController extends Controller
{
    public function burials(Request $request, $country, $type)
    {
        $authCode = $request->authcode;
        $client = new \GuzzleHttp\Client();

        $URI = "http://static.geneanum.com/libs/grid/".$country."_sepulture.php";

        $response = $client->request('POST', $URI, ['query' => [
            'prenom' => $request->FirstName,
            'nom' => $request->LastName,
            'annee_limite' => $request->per_page, // 100
            'row' => $request->row, // 100
            'sidx' => $request->sidx, // 100
            'start' => ($request->per_page * $request->page) - $request->per_page, // 2,
        ]]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();
        $persons = json_decode($response->getBody(), true);

        return response()->json($persons);
    }

    public function mariage(Request $request, $country, $type)
    {
        $authCode = $request->authcode;
        $client = new \GuzzleHttp\Client();

        $URI = "http://static.geneanum.com/libs/grid/".$country."_mariage.php";

        $response = $client->request('POST', $URI, ['query' => [
            'prenom_homme' => $request->FirstNameMale,
            'nom_homme' => $request->NameMale,
            'prenom_femme' => $request->FirstNameFemale,
            'nom_femme' => $request->NameFemale,
            'annee_limite' => $request->per_page, // 100
            'row' => $request->row, // 100
            'sidx' => $request->sidx, // 100
            'start' => ($request->per_page * $request->page) - $request->per_page, // 2,
        ]]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();
        $persons = json_decode($response->getBody(), true);

        return response()->json($persons);
    }
}
