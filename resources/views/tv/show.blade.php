@extends('layouts.main')
@section('title', $tvShow['name'])
@section('content')
    <div class="container my-5">
        <div class="row align-items-center mb-4">
            <div class="col-md-4">
                <img src="https://image.tmdb.org/t/p/w500{{ $tvShow['poster_path'] }}" alt="{{ $tvShow['name'] }}"
                    class="img-fluid rounded shadow-sm">
            </div>
            <div class="col-md-8">
                <h1 class="mb-3">{{ $tvShow['name'] }}</h1>
                <p><strong>First Air Date:</strong> {{ \Carbon\Carbon::parse($tvShow['first_air_date'])->format('d M, Y') }}</p>
                <p><strong>Genres:</strong>
                    {{ collect($tvShow['genres'])->pluck('name')->join(', ') }}
                </p>
                <p><strong>Rating:</strong>
                    <span class="badge bg-success">{{ round($tvShow['vote_average'] * 10, 1) }}%</span>
                </p>
                <p><strong>Overview:</strong> {{ $tvShow['overview'] }}</p>
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-12 mb-4">
                <h2>Seasons</h2>
                <div class="row">
                    @foreach ($tvShow['seasons'] as $season)
                        <div class="col-md-3 mb-4">
                            <div class="card shadow-sm">
                                <img src="https://image.tmdb.org/t/p/w500{{ $season['poster_path'] }}"
                                    alt="{{ $season['name'] }}" class="card-img-top">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $season['name'] }}</h6>
                                    <p class="text-muted">Episodes: {{ $season['episode_count'] }}</p>
                                    <a href="#" class="btn btn-sm btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> --}}
            {{-- <div class="col-12">
                <h2>Cast</h2>
                <div class="row">
                    @foreach ($tvShow['credits']['cast'] as $cast)
                        <div class="col-md-2 text-center mb-4">
                            <img src="https://image.tmdb.org/t/p/w500{{ $cast['profile_path'] }}"
                                alt="{{ $cast['name'] }}" class="img-fluid rounded-circle mb-2"
                                style="height: 100px; width: 100px; object-fit: cover;">
                            <p class="mb-0"><strong>{{ $cast['name'] }}</strong></p>
                            <p class="text-muted" style="font-size: 0.9rem;">{{ $cast['character'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div> --}}
        </div>
    </div>
@endsection
