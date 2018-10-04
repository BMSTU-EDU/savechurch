@extends('layouts.app')

@section('content')
    <div class="container justify-content-center">
        <div class="row mb-3">
            <div class="col-md-12">
                <h2>{{ $church->name }}</h2>
                <footer class="text-muted">{{ $church->address }}</footer>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <image-gallery images='{{ json_encode($church->image_url_array) }}'></image-gallery>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <h4>{{ __('churches.show.description') }}</h4>
                <p>{{ $church->description }}</p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <h4>{{ __('churches.show.purpose') }}</h4>
                <p>{{ $church->purpose }}</p>
            </div>
        </div>
    </div>
@endsection