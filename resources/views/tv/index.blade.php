@extends('layouts.main')
@section('title', '')
@section('content')
    <section class="movies">
        <div class="container">
            <div class="row justify-content-center mx-auto">
                @foreach ($tvShows['results'] as $tvShow)
                    <div class="col-lg-3 col-md-4 col-sm-6 text-center">
                        <div class="poster-card">
                            <a href="{{ route('tv.show', ['id' => $tvShow['id']]) }}">
                                <img src="https://image.tmdb.org/t/p/w500{{ $tvShow['poster_path'] }}"
                                    alt="{{ $tvShow['name'] }}" width="200">
                            </a>
                            <div class="poster-details">
                                <strong>{{ $tvShow['name'] }}</strong>
                                <p>First Air Year: {{ $tvShow['first_air_date'] }}</p>
                                {{-- <p>Overview: {{ $tvShow['overview'] }}</p> --}}
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
