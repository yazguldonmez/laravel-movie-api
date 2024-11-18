<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $query = $request->input('query');

        $response = $client->request('GET', 'https://api.themoviedb.org/3/search/multi', [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjNjFiMzA3NTUzMWJhZmJlZWU3Yjc5YzRlOTFjZjhlYyIsIm5iZiI6MTczMTAwMjM5NS45OTQyMDYyLCJzdWIiOiI2NzJjZWYwNmE4MTg3MTNiZGY0OTJiZGYiLCJzY29wZXMiOlsiYXBpX3JlYWQiXSwidmVyc2lvbiI6MX0.p-iWTL0kJ6zC76wi-U3thHyJO-sC3EAsppQdhPPHO6U',
                'accept' => 'application/json',
            ],
            'query' => [
                'query' => $query,
            ]
        ]);

        $results = json_decode($response->getBody(), true);

        return view('search.index', compact('results'));
    }
}
