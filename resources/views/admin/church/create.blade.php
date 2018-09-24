@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('churches.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">{{ __('churches.admin.create_form.name') }}</label>
                        <input id="name" type="text" name="name"
                               class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">{{ __('churches.admin.create_form.address') }}</label>
                        <input id="address" type="text" name="address"
                               class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
                               value="{{ old('address') }}">
                        @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="latitude">{{ __('churches.admin.create_form.latitude') }}</label>
                                <input id="latitude" type="text" name="latitude"
                                       class="form-control {{ $errors->has('latitude') ? ' is-invalid' : '' }}"
                                       value="{{ old('latitude') }}">
                                @if ($errors->has('latitude'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="longitude">{{ __('churches.admin.create_form.longitude') }}</label>
                                <input id="longitude" type="text" name="longitude"
                                       class="form-control {{ $errors->has('longitude') ? ' is-invalid' : '' }}"
                                       value="{{ old('longitude') }}">
                                @if ($errors->has('longitude'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                            class="btn btn-primary float-right">{{__('churches.admin.create_form.add')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection