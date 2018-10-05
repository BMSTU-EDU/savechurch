@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-auto">
                @component('churches.index_map_component')
                @endcomponent
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <yandex-map :coords="[55.753095, 37.615363]"
                    zoom="10"
                    style="width: auto; height: 750px;"
                    :behaviors="['default']"
                    :controls="['default']"
                    map-type="map"></yandex-map>
            </div>
        </div>
    </div>
@endsection