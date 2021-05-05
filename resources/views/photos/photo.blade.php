@extends('layouts.layout')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <p>This is the photos page.</p>
        <a href="/photos/create" class="btn btn-primary">Add a Photo</a>
        <div class="columns">
            
        </div>
        @foreach ($photos as $photo)
            <div class="column">
                <div class="card">
                    <div class="card-image">
                    <figure class="image is-4by3">
                        <img src="{{ asset('storage/' . $photo->name) }}" alt="{{ $photo->name }}">
                    </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4">{{ $photo->name }}</p>
                                <p class="subtitle is-6">{{ $photo->caption }}</p>
                            </div>
                        </div>
                    
                        <div class="content">
                            {{ $photo->description }}
                        </div>
                    </div>
                </div>
            </div>
            
        @endforeach
    </main>
@endsection

