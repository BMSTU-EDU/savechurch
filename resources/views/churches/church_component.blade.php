<div class="card mb-2 shadow bg-white rounded">
    <div class="card-body py-1">
        <div class="row py-2 px-2">
            <div class="col-3 px-0">
                <img src="{{ $church->images->count() > 0 ? $church->images->random()->image_url : '' }}"
                     class="card-img">
            </div>
            <div class="col-9 pl-3">
                <div class="row">
                    <div class="col-10">
                        <a href="{{ route('churches.front.show', $church->id) }}"><h5 class="my-0">{{ $church->name }}</h5>
                        </a>
                        <small class="text-muted">{{ $church->address }}</small>
                    </div>
                    <div class="col-2">
                        <i class="far fa-heart float-right" style="cursor: pointer"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="mt-2">
                            {{ $church->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>