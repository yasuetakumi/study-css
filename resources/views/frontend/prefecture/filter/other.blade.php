<template>
    <div class="card-header d-flex bg-white">
        <h3 class="card-title mb-0">
            検索条件を絞り込む
        </h3>
    </div>

    <div class="card-body clearfix">
        <div class="row">

            <!-- Start - Surface Area Filter -->
            <div class="col-6">
                <div class="search-area mb-3">
                    <p class="border-left border-primary pl-2">@lang('label.surface_area')</p>
                    <div class="row">
                        <div class="col-6">
                            <select v-model="items.filter.surface_min" class="form-control" name="surface_min">
                                <option :value="null" >下限なし</option>
                                @foreach ($surface_areas as $surface)
                                <option value="{{$surface->value}}">{{$surface->label_jp}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <select v-model="items.filter.surface_max" class="form-control" name="surface_max">
                                <option :value="null">上限なし</option>
                                @foreach ($surface_areas as $surface)
                                <option value="{{$surface->value}}">{{$surface->label_jp}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End - Surface Area Filter -->

            <!-- Start - Rent Price Filter -->
            <div class="col-6">
                <div class="search-rent mb-3">
                    <p class="border-left border-primary pl-2">@lang('label.rent_amount')</p>
                    <div class="row">
                        <div class="col-6">
                            <select v-model="items.filter.rent_amount_min" class="form-control" name="rent_amount_min" id="rent">
                                <option :value="null">下限なし</option>
                                @foreach ($rent_amounts as $rent)
                                <option value="{{$rent->value}}">{{$rent->label_jp}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <select v-model="items.filter.rent_amount_max" class="form-control" name="rent_amount_max" id="rent">
                                <option :value="null">上限なし</option>
                                @foreach ($rent_amounts as $rent)
                                <option value="{{$rent->value}}">{{$rent->label_jp}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End - Rent Price Filter -->

        </div>

        <!-- Start - Floor type (default: unchecked) -->
        <div class="search-underground-floor mb-3">
            <p class="border-left border-primary pl-2">@lang('label.underground')</p>
            <div class="row">
                <div class="col-12">
                    <div class="form-check">
                        <input @click="changeFloorType(items.floorType)" v-model="items.floorType" class="form-check-input" type="checkbox" id="floor-type">
                        <label for="floor-type" class="form-check-label">地下</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- End - Floor type -->

        <!-- Start - Floor Underground Filter -->
        <div v-if="items.floorType" class="search-underground-floor mb-3">
            <p class="border-left border-primary pl-2">@lang('label.number_of_floor_underground')</p>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @foreach ($floor_undergrounds as $underground)
                        <div class="col-1">
                            <div class="form-check">
                                <input v-model="items.filter.undergrounds" class="form-check-input" name="floor_under[]" type="checkbox" value="{{$underground->value}}" id="floor-under-{{$underground->id}}">
                                <label for="floor-under-{{$underground->id}}" class="form-check-label">{{$underground->label_jp}}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- End - Floor Underground Filter -->

        <!-- Start - Floor Aboveground Filter -->
        <div v-else-if="!items.floorType" class="search-aboveground-floor mb-3">
            <p class="border-left border-primary pl-2">@lang('label.number_of_floor_aboveground')</p>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @foreach ($floor_abovegrounds as $above)
                        <div class="col-1">
                            <div class="form-check">
                                <input v-model="items.filter.abovegrounds" class="form-check-input" name="floor_above[]" type="checkbox" value="{{$above->value}}" id="floor-above-{{$above->id}}">
                                <label for="floor-above-{{$above->id}}" class="form-check-label">{{$above->label_jp}}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- End - Floor Aboveground Filter -->

        <!-- Start - Property Type Filter -->
        <div class="search-property-type mb-3">
            <p class="border-left border-primary pl-2">@lang('label.property_types')</p>
            <div class="row">
                <div class="col-12">
                   <div class="row">
                        @foreach ($property_types as $pt)
                        <div class="col-3">
                            <div class="form-check">
                                <input id="property-type-{{$pt->id}}" v-model="items.filter.types" class="form-check-input" name="property_type[]" type="checkbox" value="{{$pt->id}}">
                                <label for="property-type-{{$pt->id}}" class="form-check-label">{{$pt->label_jp}}</label>
                            </div>
                        </div>
                        @endforeach
                   </div>
                </div>
            </div>
        </div>
        <!-- End - Property Type Filter -->

        <!-- Start - Is Skeleton Filter -->
        <div class="search-is-skeleton mb-3">
            <p class="border-left border-primary pl-2">@lang('label.skeleton')</p>
            <div class="row">
                <div class="col-2">
                    <div class="form-check">
                        <input id="skeleton-0" v-model="items.filter.skeleton" class="form-check-input" ref="skeleton" name="skeleton" value="0" type="checkbox">
                        <label for="skeleton-0" class="form-check-label">スケルトン物件</label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-check">
                        <input id="skeleton-1" v-model="items.filter.furnished" class="form-check-input" ref="furnished" name="furnished" value="1" type="checkbox">
                        <label for="skeleton-1" class="form-check-label">居抜き物件</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- End - Is Skeleton Filter -->

        <!-- Start - Property Preference Filter -->
        <div class="search-property-preference mb-3">
            <p class="border-left border-primary pl-2">@lang('label.property_preference')</p>
            <div class="row">
                <div class="col-12">
                    @foreach ($property_preferences as $pp)
                    <div class="form-check">
                        <input id="property-preference-{{$pp->id}}" v-model="items.filter.preferences" class="form-check-input" name="property_preference[]" type="checkbox" value="{{$pp->id}}">
                        <label for="property-preference-{{$pp->id}}" class="form-check-label">{{$pp->label_jp}}</label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End - Property Preference Filter -->

        <!-- Start - Walking Distance Filter -->
        <div class="search-walking-distance mb-3">
            <p class="border-left border-primary pl-2">@lang('label.walking_distance_from_station')</p>
            <div class="row">
                <div class="col-6">
                    <select v-model="items.filter.walking_distance" class="form-control" name="walking_distance">
                        <option :value="null">選択なし</option>
                        @foreach ($walking_distances as $walking)
                        <option value="{{$walking->id}}">{{$walking->label_jp}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <!-- End - Walking Distance Filter -->

        <!-- Start - Search All  Filter -->
        <div class="search-all mb-3">
            <p class="border-left border-primary pl-2">フリーワード</p>
            <div class="row">
                <div class="col-12">
                    <input v-model="items.filter.name" type="text" name="name" class="form-control" placeholder="恵比寿、山手線、渋谷区など" value="">
                </div>
            </div>
        </div>
        <!-- End - Search All  Filter -->

    </div>
</template>
