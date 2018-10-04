@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @component('admin.church.church_form', ['errors' => $errors, 'delete_url' => route('image.entity_delete')])
                    @slot('action')
                        {{ route('churches.store') }}
                    @endslot
                    @slot('submit_button_text')
                        {{ __('churches.admin.create_form.add') }}
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection