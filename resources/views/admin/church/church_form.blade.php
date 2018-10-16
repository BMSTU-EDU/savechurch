<form action="{{ $action }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ $method_field ?? ''}}
    <div class="form-group">
        <label for="name">{{ __('churches.admin.create_form.name') }}</label>
        <input id="name" type="text" name="name"
               class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
               value="{{ old('name') ?? $church->name ?? ''}}">
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
               value="{{ old('address') ?? $church->address ?? ''}}">
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
                       value="{{ old('latitude') ?? $church->latitude ?? ''}}">
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
                       value="{{ old('longitude') ?? $church->longitude ?? ''}}">
                @if ($errors->has('longitude'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('longitude') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="description">{{ __('churches.admin.create_form.description') }}</label>
        <textarea id="description" type="text" name="description" rows="5"
                  class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
        >{{ old('description') ?? $church->description ?? ''}}</textarea>
        @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="purpose">{{ __('churches.admin.create_form.purpose') }}</label>
        <textarea id="purpose" type="text" name="purpose" rows="5"
                  class="form-control {{ $errors->has('purpose') ? ' is-invalid' : '' }}"
        >{{ old('purpose') ?? $church->purpose ?? ''}}</textarea>
        @if ($errors->has('purpose'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('purpose') }}</strong>
            </span>
        @endif
    </div>
    <add-contact button_text="{{ __('churches.admin.create_form.add_image_contact') }}"
         add_contact_text="{{ __('churches.admin.create_form.add_contact_text') }}"
         income_contacts="[]"
         delete_url=""
         contact_image_url_post=""
    ></add-contact>
    @if(!empty($errors->has('images')))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('images')}}
        </div>
    @endif
    <upload-images button_text="{{ __('churches.admin.create_form.add_image') }}"
                   image_url_post="{{ route('image.upload') }}" uploaded="{{ $uploaded ?? '[]' }}"
                   delete_url="{{ $delete_url }}"></upload-images>
    <button type="submit"
            class="btn btn-primary float-right">{{ $submit_button_text }}
    </button>
</form>