@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
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