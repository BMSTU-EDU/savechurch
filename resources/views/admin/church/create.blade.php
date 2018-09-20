@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('churches.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">{{ __('churches.create_form.name') }}</label>
                        <input id="name" type="text" name="name"
                               class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary float-right">{{__('churches.create_form.add')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection