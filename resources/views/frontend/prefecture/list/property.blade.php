<template>
    <div class="card rounded-0">
        <div class="card-header bg-white border-bottom-0">
            <h3 class="card-title mb-0">List Property In {{$prefecture->display_name}}</h3>
        </div>

        <hr class="my-0 mx-2">

        <div class="card-body">
            <div class="row">
                @foreach ($properties as $property)
                    <div class="col-lg-4">
                        <div class="card">
                            {{-- <img class="card-img-top" src="{{$property->thumbnail_image_main}}" alt="{{$property->thumbnail_image_main}}"> --}}
                            <div class="card-body d-flex flex-column">
                                <p class="card-title">{{$property->location}}</p>
                                <span>@lang('label.surface_area_tsubo') : {{toTsubo($property->surface_area)}}</span>
                                <span>@lang('label.rent_amount_man') : {{toMan($property->rent_amount)}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</template>
