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
    <h4>{{ __('churches.admin.create_form.contact_information') }}</h4>
    @if(!empty($errors->has('contact_image')))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('contact_image')}}
        </div>
    @endif
    <div class="row mb-4">
        <div class="col-3">
            <add-contact-image
                    income_image="{{ old('contact_image') ?? $church->contact->image_url ?? '' }}"></add-contact-image>
        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-6 form-group">
                    <input type="text" name="contact_name" placeholder="ФИО"
                           class="form-control {{ $errors->has('contact_name') ? ' is-invalid' : '' }}"
                           value="{{ old('contact_name') ?? $church->contact->name ?? ''}}"/>
                    @if ($errors->has('contact_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('contact_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-6 form-group">
                    <input type="text" name="contact_role" placeholder="Роль в проекте"
                           class="form-control {{ $errors->has('contact_role') ? ' is-invalid' : '' }}"
                           value="{{ old('contact_role') ?? $church->contact->role ?? ''}}"/>
                    @if ($errors->has('contact_role'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('contact_role') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <input type="text" name="contact_email" placeholder="E-Mail"
                           class="form-control {{ $errors->has('contact_email') ? ' is-invalid' : '' }}"
                           value="{{ old('contact_email') ?? $church->contact->email ?? ''}}"/>
                    @if ($errors->has('contact_email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('contact_email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-6 form-group">
                    <input type="text" name="contact_phone" placeholder="Телефон"
                           class="form-control {{ $errors->has('contact_phone') ? ' is-invalid' : '' }}"
                           value="{{ old('contact_phone') ?? $church->contact->phone ?? ''}}"/>
                    @if ($errors->has('contact_phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('contact_phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <input type="text" name="contact_vk" placeholder="Страница VK"
                           class="form-control {{ $errors->has('contact_vk') ? ' is-invalid' : '' }}"
                           value="{{ old('contact_vk') ?? $church->contact->vk ?? ''}}"/>
                    @if ($errors->has('contact_vk'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('contact_vk') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-6 form-group">
                    <input type="text" name="contact_facebook" placeholder="Страница Facebook"
                           class="form-control {{ $errors->has('contact_facebook') ? ' is-invalid' : '' }}"
                           value="{{ old('contact_facebook') ?? $church->contact->facebook ?? ''}}"/>
                    @if ($errors->has('contact_facebook'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('contact_facebook') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <h4>{{ __('churches.admin.create_form.images') }}</h4>
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