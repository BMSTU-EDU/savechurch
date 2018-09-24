@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @component('admin.church.church_form', ['errors' => $errors])
                    @slot('action')
                        {{ route('churches.update', $church->id) }}
                    @endslot
                    @slot('method_field')
                        @method('put')
                    @endslot
                    @slot('name_value')
                        {{ old('name') ?? $church->name }}
                    @endslot
                    @slot('address_value')
                        {{ old('address') ?? $church->address }}
                    @endslot
                    @slot('latitude_value')
                        {{ old('latitude') ?? $church->latitude }}
                    @endslot
                    @slot('longitude_value')
                        {{ old('longitude') ?? $church->longitude }}
                    @endslot
                    @slot('submit_button_text')
                        {{ __('churches.admin.create_form.update') }}
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection