@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-6">
                    </div>
                    <div class="col-6 text-right">
                        <h6><a href="{{route('admin.churches.list.trashed.flush')}}"><i class="fas fa-ban"></i> {{ __('churches.admin.list.flush_trashed') }}</a></h6>
                    </div>
                </div>
                @foreach($churches as $church)
                    @component('admin.church.church_component', ['church' => $church])
                        @slot('right_link')
                            <a href="{{ route('admin.churches.list.trashed.restore', $church->id) }}">
                                <i class="fas fa-undo-alt"></i> {{ __('churches.admin.list.restore') }}</a>
                        @endslot
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