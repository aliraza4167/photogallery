@extends('layouts.layout')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <p>This is the product page.</p>
        <div class="columns">
            
        </div>
        @foreach ($products as $product)
            <div class="column">
                <div class="card">
                    <div class="card-image">
                    <figure class="image is-4by3">
                        <img src="{{ asset('images/' . $product->name . '.jpg') }}" alt="{{ $product->name }}">
                    </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4">{{ $product->name }}</p>
                                <p class="subtitle is-6">{{ $product->category }}</p>
                            </div>
                        </div>
                    
                        <div class="content">
                            {{ $product->description }}
                        </div>
                    </div>
                </div>
            </div>
            
        @endforeach
    </main>
@endsection

