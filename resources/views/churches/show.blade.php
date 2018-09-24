@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h2>{{ $church->name }}</h2>
                <footer class="text-muted">{{ $church->address }}</footer>
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
@endsection