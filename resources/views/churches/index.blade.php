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
                @foreach($churches as $church)
                    @component('churches.church_component', ['church' => $church])
                    @endcomponent
                @endforeach
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-auto">
                {{ $churches->links() }}
            </div>
        </div>
    </div>
@endsection