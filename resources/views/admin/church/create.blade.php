@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @component('admin.church.church_form', ['errors' => $errors])
                    @slot('action')
                        {{ route('churches.store') }}
                    @endslot
                    @slot('name_value')
                        {{ old('name') }}
                    @endslot
                    @slot('address_value')
                        {{ old('address') }}
                    @endslot
                    @slot('latitude_value')
                        {{ old('latitude') }}
                    @endslot
                    @slot('longitude_value')
                        {{ old('longitude') }}
                    @endslot
                    @slot('submit_button_text')
                        {{ __('churches.admin.create_form.add') }}
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection