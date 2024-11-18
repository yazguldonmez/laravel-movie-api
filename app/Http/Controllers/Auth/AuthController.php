<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

    public function redirectToTMDB()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.themoviedb.org/3/authentication/token/new', [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjNjFiMzA3NTUzMWJhZmJlZWU3Yjc5YzRlOTFjZjhlYyIsIm5iZiI6MTczMTAwMjM5NS45OTQyMDYyLCJzdWIiOiI2NzJjZWYwNmE4MTg3MTNiZGY0OTJiZGYiLCJzY29wZXMiOlsiYXBpX3JlYWQiXSwidmVyc2lvbiI6MX0.p-iWTL0kJ6zC76wi-U3thHyJO-sC3EAsppQdhPPHO6U',
                'accept' => 'application/json',
            ],
        ]);
        $requestToken = $response->getBody();

        session(['tmdb_request_token' => $requestToken]);

        return redirect("https://www.themoviedb.org/authenticate/{$requestToken}?redirect_to=" . route('auth.tmdb.callback'));
    }

    public function handleTMDBCallback()
    {
        $requestToken = session('tmdb_request_token');

        $response = Http::post("https://api.themoviedb.org/3/authentication/session/new", [
            'api_key' => env('TMDB_API_KEY'),
            'request_token' => $requestToken
        ])->json();

        //dd(session('tmdb_request_token'));

        if (isset($response['session_id'])) {

            session(['tmdb_session_id' => $response['session_id']]);
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }
}
