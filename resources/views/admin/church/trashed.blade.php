@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-6">
                        <h6><a href="{{route('churches.create')}}">{{ __('churches.admin.list.create') }}</a></h6>
                    </div>
                    <div class="col-6">
                        <h6 class="float-right"><a href="{{route('admin.churches.list.trashed.flush')}}">{{ __('churches.admin.list.flush_trashed') }}</a></h6>
                    </div>
                </div>
                @foreach($churches as $church)
                    @component('admin.church.church_component', ['church' => $church])
                        @slot('right_link')
                            <a href="{{ route('admin.churches.list.trashed.restore', $church->id) }}">{{ __('churches.admin.list.restore') }}</a>
                        @endslot
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>
@endsection