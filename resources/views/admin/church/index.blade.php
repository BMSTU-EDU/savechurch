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
                        <h6 class="float-right"><a
                                    href="{{route('admin.churches.list.trashed')}}">{{ __('churches.admin.list.trashed') }}</a>
                        </h6>
                    </div>
                </div>
                @foreach($churches as $church)
                    @component('admin.church.church_component', ['church' => $church])
                        @slot('right_link')
                            <div class="row">
                                <div class="col-6">
                                    <a class="btn btn-link p-0"
                                       href="{{ route('churches.edit', $church->id) }}">{{__('churches.admin.list.edit')}}</a>
                                </div>
                                <div class="col-6">
                                    <form action="{{ route('churches.destroy', $church->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-link p-0"
                                                type="submit">{{ __('churches.admin.list.delete') }}</button>
                                    </form>
                                </div>
                            </div>
                        @endslot
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>
@endsection