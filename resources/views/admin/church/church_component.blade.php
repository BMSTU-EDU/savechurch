<div class="card mb-2">
    <div class="card-body py-1">
        <div class="row">
            <div class="col-3">
                <img src="{{ $church->images->count() > 0 ? $church->images->random()->image_url : '' }}"
                     class="card-img">
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-7">
                        <a href="{{ route('churches.show', $church->id) }}"><h5 class="my-0">{{ $church->name }}</h5>
                        </a>
                        <small class="text-muted">{{ $church->address }}</small>
                    </div>
                    <div class="col-5 text-right">
                        {{ $right_link }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>