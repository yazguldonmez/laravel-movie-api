@extends('layouts.main')
@section('title', '')
@section('content')
    <section class="movies">
        <div class="container">
            <div class="row justify-content-center mx-auto">
                @foreach ($movies['results'] as $movie)
                    <div class="col-lg-3 col-md-4 col-sm-6 text-center">
                        <div class="poster-card">
                            <a href="{{ route('movies.show', ['id' => $movie['id']]) }}">
                                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                                    alt="{{ $movie['title'] }}" width="200">
                            </a>
                            <div class="poster-details">
                                <strong>{{ $movie['title'] }}</strong>
                                <p>Release Date: {{ $movie['release_date'] }}</p>
                                {{-- <p>Overview: {{ $movie['overview'] }}</p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
