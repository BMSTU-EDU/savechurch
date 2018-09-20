@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h6><a href="{{route('churches.create')}}">{{ __('churches.list.create') }}</a></h6>
                @foreach($churches as $church)
                    <div class="card">
                        <div class="card-header">
                            {{ $church->name }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <img src="">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection