<form action="{{ $action }}" method="post">
    {{ csrf_field() }}
    {{ $method_field ?? ''}}
    <div class="form-group">
        <label for="name">{{ __('churches.admin.create_form.name') }}</label>
        <input id="name" type="text" name="name"
               class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
               value="{{ $name_value }}">
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
               value="{{ $address_value }}">
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
                       value="{{ $latitude_value }}">
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
                       value="{{ $longitude_value }}">
                @if ($errors->has('longitude'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('longitude') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <button type="submit"
            class="btn btn-primary float-right">{{ $submit_button_text }}
    </button>
</form>