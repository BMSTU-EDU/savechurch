@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-6">
                        <h6><a href="{{route('churches.create')}}"><i
                                        class="far fa-plus-square"></i> {{ __('churches.admin.list.create') }}</a></h6>
                    </div>
                    <div class="col-6 text-right">
                        <h6><a href="{{route('admin.churches.list.trashed')}}">
                                <i class="fas fa-trash-alt"></i> {{ __('churches.admin.list.trashed') }}</a>
                        </h6>
                    </div>
                </div>
                @foreach($churches as $church)
                    @component('admin.church.church_component', ['church' => $church])
                        @slot('right_link')
                            <a class="btn btn-link p-0 d-inline"
                               href="{{ route('churches.edit', $church->id) }}"><i
                                        class="far fa-edit"></i> {{__('churches.admin.list.edit')}}</a> |
                            <form action="{{ route('churches.destroy', $church->id) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-link p-0"
                                        type="submit"><i
                                            class="far fa-trash-alt"></i> {{ __('churches.admin.list.delete') }}
                                </button>
                            </form>
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