@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @component('admin.church.church_form', ['errors' => $errors, 'church' => $church])
                    @slot('action')
                        {{ route('churches.update', $church->id) }}
                    @endslot
                    @slot('method_field')
                        @method('put')
                    @endslot
                    @slot('submit_button_text')
                        {{ __('churches.admin.create_form.update') }}
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection