<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TVShowController extends Controller
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.tmdb.api_key');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get("https://api.themoviedb.org/3/tv/popular", [
            'api_key' => $this->apiKey,
            'language' => 'en-US',
            'page' => 1
        ]);

        $tvShows = $response->json();

        return view('tv.index', compact('tvShows'));
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
        $response = Http::get("https://api.themoviedb.org/3/tv/{$id}", [
            'api_key' => $this->apiKey,
            'language' => 'en-US'
        ]);

        $tvShow = $response->json();

        return view('tv.show', compact('tvShow'));
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
}
