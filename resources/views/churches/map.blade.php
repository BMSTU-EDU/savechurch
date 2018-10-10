@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-auto">
                @component('churches.index_map_component')
                @endcomponent
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <church-map churches_url="{{route('json.church.list')}}"></church-map>
            </div>
        </div>
    </div>
@endsection