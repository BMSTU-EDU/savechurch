@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-auto">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/" class="btn btn{{ request()->is('/') ? '' : '-outline' }}-primary">{{__('churches.show.by_list')}}</a>
                    <a href="/" class="btn btn{{ request()->is('/map') ? '' : '-outline' }}-primary">{{__('churches.show.by_map')}}</a>
                </div>
            </div>
        </div>
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