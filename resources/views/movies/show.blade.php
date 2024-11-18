@extends('layouts.main')
@section('title', $movie['title'])
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}"
                    class="img-fluid rounded">
            </div>
            <div class="col-md-8">
                <h1>{{ $movie['title'] }}</h1>
                <p><strong>Release Date:</strong> {{ \Carbon\Carbon::parse($movie['release_date'])->format('F d, Y') }}</p>
                <span class="badge bg-success">{{ round($movie['vote_average'] * 10, 1) }}%</span>
                <p><strong>Genres:</strong>
                    @foreach ($movie['genres'] as $genre)
                        {{ $genre['name'] }}@if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                </p>
                <p><strong>Language:</strong> {{ $movie['original_language'] }}</p>
                <p><strong>Production Companies:</strong>
                    @foreach ($movie['production_companies'] as $company)
                        {{ $company['name'] }}@if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                </p>
                <p><strong>Overview:</strong> {{ $movie['overview'] }}</p>
            </div>
        </div>
    </div>
@endsection
