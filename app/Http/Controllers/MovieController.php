<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class MovieController extends Controller
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.tmdb.api_key');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $request->query('page', 1);

        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular', [
            'headers' => [
                'accept' => 'application/json',
            ],
            'query' => [
                'api_key' => $this->apiKey,
                'page' => 1
            ],
        ]);

        $movies = json_decode($response->getBody(), true);

        return view('movies.index', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', "https://api.themoviedb.org/3/movie/{$id}", [
            'headers' => [
                'accept' => 'application/json',
            ],
            'query' => [
                'api_key' => $this->apiKey,
                'language' => 'en-US',
            ],
        ]);

        $movie = json_decode($response->getBody(), true);

        return view('movies.show', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showPopularMoveies()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular?language=en-US&page=1', [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjNjFiMzA3NTUzMWJhZmJlZWU3Yjc5YzRlOTFjZjhlYyIsIm5iZiI6MTczMTAwMjM5NS45OTQyMDYyLCJzdWIiOiI2NzJjZWYwNmE4MTg3MTNiZGY0OTJiZGYiLCJzY29wZXMiOlsiYXBpX3JlYWQiXSwidmVyc2lvbiI6MX0.p-iWTL0kJ6zC76wi-U3thHyJO-sC3EAsppQdhPPHO6U',
                'accept' => 'application/json',
            ],
        ]);

        $popularMovies = json_decode($response->getBody(), true);

        return view('movies.index', compact('popularMovies'));
    }
}
