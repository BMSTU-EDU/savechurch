@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h2>{{ $church->name }}</h2>
                <footer class="text-muted">{{ $church->address }}</footer>
            </div>
            <div class="col-3">
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
            </div>
        </div>
    </div>
@endsection