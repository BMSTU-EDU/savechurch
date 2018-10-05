@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @component('admin.church.church_form',
                    [
                        'errors' => $errors,
                        'church' => $church,
                        'uploaded' => json_encode(array_merge($church->image_url_array, old('images') ?? [])),
                        'delete_url' => route('image.entity_delete')
                    ])
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