@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h6><a href="{{route('churches.create')}}">{{ __('churches.list.create') }}</a></h6>
                @foreach($churches as $church)
                    <div class="card mb-2">
                        <div class="card-body py-1">
                            <div class="row">
                                <div class="col-6">
                                    <h5>{{ $church->name }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <img src="" class="card-img">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection