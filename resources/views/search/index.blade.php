@extends('layouts.main')
@section('title', 'Search Results')
@section('content')
    <section class="search-results">
        <div class="container">
            <div class="row">
                @if (isset($results['results']) && count($results['results']) > 0)
                    @foreach ($results['results'] as $result)
                        @php
                            $type = $result['media_type'] === 'movie' ? 'movies.show' : 'tv.show';
                            $title = $result['title'] ?? $result['name'] ?? 'No Title';
                            $route = route($type, ['id' => $result['id']]);
                        @endphp

                        <div class="col-md-12">
                            <div class="card mb-3" style="max-width: 100%;">
                                <div class="row g-0 align-items-center">
                                    <!-- Görsel -->
                                    <div class="col-md-4">
                                        <a href="{{ $route }}">
                                            <img src="https://image.tmdb.org/t/p/w500{{ $result['poster_path'] }}"
                                                 alt="{{ $title }}"
                                                 class="img-fluid rounded-start"
                                                 style="width: 150px; height: auto;">
                                        </a>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{ $route }}">
                                                    {{ $title }}
                                                </a>
                                            </h5>
                                            <p class="card-text">{{ $result['overview'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <p>No results found</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
