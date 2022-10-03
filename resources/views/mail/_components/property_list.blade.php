<div class="card card-secondary">
    <a href="{{ route('property.detail', $property->id) }}">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    {{-- //TODO Check condition --}}
                    <p class="text-black mb-0">
                        @if ($property->city_id != null && $property->property_stations[0])
                        {{ $property->prefecture->display_name . $property->city->display_name . $property->location }}
                        （{{ $property->property_stations[0]->station->display_name }}駅  徒歩{{ $property->property_stations[0]->walking_distance->label_jp }}）の貸店舗
                        @else
                        -
                        @endif
                    </p>

                </div>
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
    </a>
    <div class="card-body p-2 d-flex flex-column">
        <a href="{{ route('property.detail', $property->id) }}">
            <div class="row mb-3">
                <div class="col-5">
                    <div class="position-relative">
                        <img class="w-100" src="{{ asset("uploads/{$property->thumbnail_image_main}") }}" alt="thumbnail">
                        <div class="position-absolute" style="top:3px; left:0px">
                            <span class="p-1 bg-secondary rounded-sm">
                                {{ $property->is_skeleton ? 'スケルトン' : '居抜き' }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <dl>
                        <dt class="text-dark">{{ $property->property_stations[0]->station->station_line->display_name }}  {{ $property->property_stations[0]->station->display_name }}徒歩{{ $property->property_stations[0]->walking_distance->label_jp }}</dt>
                        <dt class="text-info">賃料/坪単価 <span class="text-dark">{{ $property->man }} / {{ number_format($property->yen_per_tsubo) }}円</span></dt>
                        <dt class="text-info">面積 <span class="text-dark">{{ $property->surface_area }}㎡ / {{ $property->tsubo }}</span></dt>
                        <dt class="text-info">所在地 <span class="text-dark">{{ $property->location }}</span></dt>
                        <dt class="text-info">前業態/希望譲渡料 <span class="text-dark">@{{cuisineOrTransfer}}</span></dt>
                    </dl>
                </div>
            </div>
        </a>
        <div class="d-flex mt-auto flex-column align-self-start">
            <slot></slot>
        </div>
    </div>
</div>
