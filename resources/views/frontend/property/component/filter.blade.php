<div class="card">
    <div class="card-header d-flex justify-content-center">
        <h3 class="card-title mb-0">
            条件で絞る
        </h3>
    </div>

    <form action="{{route('property.filter')}}" method="POST" id="filterForm">
        @csrf
        <div style="display: none" v-for="(city, index) in filterCity" :key="index">
            <input type="hidden" name="city[]" :value="city">
        </div>
        <div style="display: none" v-for="(station, index) in filterStation" :key="index">
            <input type="hidden" name="station[]" :value="station">
        </div>
        <div class="card-body clearfix">

            {{-- Surface Area Filter--}}
            <div class="search-area mb-3">
                <p class="border-left border-primary pl-2">@lang('label.surface_area')</p>
                <div class="row">
                    <div class="col-6">
                        <select v-model="items.filter.surface_min" class="form-control" name="surface_min" @change="getCountProperty">
                            <option :value="null" >下限なし</option>
                            @foreach ($surface_areas as $surface)
                            <option value="{{$surface->value}}">{{$surface->label_jp}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <select v-model="items.filter.surface_max" class="form-control" name="surface_max" @change="getCountProperty">
                            <option :value="null">上限なし</option>
                            @foreach ($surface_areas as $surface)
                            <option value="{{$surface->value}}">{{$surface->label_jp}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {{-- Rent Price Filter --}}
            <div class="search-rent mb-3">
                <p class="border-left border-primary pl-2">@lang('label.rent_amount')</p>
                <div class="row">
                    <div class="col-6">
                        <select v-model="items.filter.rent_amount_min" class="form-control" name="rent_amount_min" id="rent" @change="getCountProperty">
                            <option :value="null">下限なし</option>
                            @foreach ($rent_amounts as $rent)
                            <option value="{{$rent->value}}">{{$rent->label_jp}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <select v-model="items.filter.rent_amount_max" class="form-control" name="rent_amount_max" id="rent" @change="getCountProperty">
                            <option :value="null">上限なし</option>
                            @foreach ($rent_amounts as $rent)
                            <option value="{{$rent->value}}">{{$rent->label_jp}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {{-- Search All  Filter--}}
            <div class="search-all mb-3">
                <p class="border-left border-primary pl-2">フリーワード</p>
                <div class="row">
                    <div class="col-12">
                        <input v-model="items.filter.name" type="text" name="name" class="form-control" placeholder="恵比寿、山手線、渋谷区など" value="" @change="getCountProperty">
                    </div>
                </div>
            </div>

            {{-- Walking Distance Filter --}}
            <div class="search-walking-distance mb-3">
                <p class="border-left border-primary pl-2">@lang('label.walking_distance_from_station')</p>
                <div class="row">
                    <div class="col-6">
                        <select v-model="items.filter.walking_distance" class="form-control" name="walking_distance" @change="getCountProperty">
                            <option :value="null">選択なし</option>
                            @foreach ($walking_distances as $walking)
                            <option value="{{$walking->value}}">{{$walking->label_jp}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {{-- Floor Underground Filter --}}
            <div class="search-underground-floor mb-3">
                <p class="border-left border-primary pl-2">@lang('label.number_of_floor_underground')</p>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            @foreach ($floor_undergrounds as $underground)
                            <div class="col-6">
                                <div class="form-check">
                                    <input v-model="items.filter.undergrounds" class="form-check-input" name="floor_under[]" type="checkbox" value="{{$underground->value}}" id="floor-under-{{$underground->id}}" @change="getCountProperty">
                                    <label for="floor-under-{{$underground->id}}" class="form-check-label">{{$underground->label_jp}}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Floor Aboveground Filter --}}
            <div class="search-aboveground-floor mb-3">
                <p class="border-left border-primary pl-2">@lang('label.number_of_floor_aboveground')</p>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            @foreach ($floor_abovegrounds as $above)
                            <div class="col-6">
                                <div class="form-check">
                                    <input v-model="items.filter.abovegrounds" class="form-check-input" name="floor_above[]" type="checkbox" value="{{$above->value}}" id="floor-above-{{$above->id}}" @change="getCountProperty">
                                    <label for="floor-above-{{$above->id}}" class="form-check-label">{{$above->label_jp}}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Property Preference Filter --}}
            <div class="search-property-preference mb-3">
                <p class="border-left border-primary pl-2">@lang('label.property_preference')</p>
                <div class="row">
                    <div class="col-12">
                        @foreach ($property_preferences as $pp)
                        <div class="form-check">
                            <input v-model="items.filter.preferences" class="form-check-input" name="property_preference[]" type="checkbox" value="{{$pp->id}}" @change="getCountProperty">
                            <label class="form-check-label">{{$pp->label_jp}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Property Type Filter --}}
            <div class="search-property-type mb-3">
                <p class="border-left border-primary pl-2">@lang('label.property_types')</p>
                <div class="row">
                    <div class="col-12">
                        @foreach ($property_types as $pt)
                        <div class="form-check">
                            <input v-model="items.filter.types" class="form-check-input" name="property_type[]" type="checkbox" value="{{$pt->id}}" @change="getCountProperty">
                            <label class="form-check-label">{{$pt->label_jp}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Is Skeleton Filter --}}
            <div class="search-is-skeleton mb-3">
                <p class="border-left border-primary pl-2">@lang('label.skeleton')</p>
                <div class="row">
                    <div class="col-12">
                        <div class="form-check">
                            <input v-model="items.filter.skeleton" class="form-check-input" ref="skeleton" name="skeleton" value="0" type="checkbox" @change="getCountProperty">
                            <label class="form-check-label">スケルトン物件</label>
                        </div>
                        <div class="form-check">
                            <input v-model="items.filter.furnished" class="form-check-input" ref="furnished" name="furnished" value="1" type="checkbox" @change="getCountProperty">
                            <label class="form-check-label">居抜き物件</label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Cuisine Filter --}}
            <button type="button" class="btn btn-secondary w-100" data-toggle="modal" data-target="#exampleModalCenter" :disabled="disabled">
                居抜き物件をさらに絞る
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">居抜き物件をさらに絞る</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            {{-- Cuisines Filter --}}
                            <div class="search-cuisines mb-3">
                                <p class="border-left border-primary pl-2">@lang('label.cuisines')</p>
                                <hr>
                                <div class="row">
                                    @foreach ($cuisines as $cu)
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input v-model="items.filter.cuisines" class="form-check-input" name="cuisine[]" type="checkbox" value="{{$cu->id}}" id="cuisine-{{$cu->id}}" @change="getCountProperty">
                                                <label for="cuisine-{{$cu->id}}" class="form-check-label">{{$cu->label_jp}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <hr>

                            {{-- Transfer Price Option --}}
                            <div class="search-walking-distance mb-3">
                                <p class="border-left border-primary pl-2">@lang('label.transfer_price_option')</p>
                                <div class="row">
                                    <div class="col-4">
                                        <select v-model="items.filter.transfer_price_min" class="form-control" name="transfer_price_min" @change="getCountProperty">
                                            <option :value="null">選択なし</option>
                                            @foreach ($transfer_price_options as $opt)
                                            <option value="{{$opt->value}}">{{$opt->label_jp}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select v-model="items.filter.transfer_price_max" class="form-control" name="transfer_price_max" @change="getCountProperty">
                                            <option :value="null">選択なし</option>
                                            @foreach ($transfer_price_options as $opt)
                                            <option value="{{$opt->value}}">{{$opt->label_jp}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Show Count Property After Filter --}}
            <div class="result-total mt-3">
                <div class="row">
                    <div class="col-12">
                        <h3 class="font-weight-bold" style="color: #f34e05; font-size: 22px;">@{{property_count}} <span style="font-size: 16px; color: black"> 件の該当物件</span> </h3>
                        <button type="submit" name="search_button" class="btn btn-primary px-4 py-2 d-block w-100 mt-3">
                            <span>
                                <i class="fas fa-search"></i>
                                この条件で検索
                            </span>
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </form>
</div>
