<div class="btn-group" role="group" aria-label="Basic example">
    <a href="/"
       class="btn btn{{ request()->is('/') ? '' : '-outline' }}-primary">{{__('churches.show.by_list')}}</a>
    <a href="{{ route('map') }}"
       class="btn btn{{ request()->is('map') ? '' : '-outline' }}-primary">{{__('churches.show.by_map')}}</a>
</div>