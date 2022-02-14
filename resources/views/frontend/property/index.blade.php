@extends('backend._base.content_form')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <h3 class="card-title mb-0">
                    条件で絞る
                </h3>
            </div>
            <!-- /.card-header -->
            <form action="{{route('property.filter')}}" method="POST" id="formElement">
                @csrf
                <input type="hidden" name="city[]" :value="filterCity">
                <input type="hidden" name="station[]" :value="filterStations">
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
                    <!-- Button trigger modal -->
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
                                <button type="submit" class="btn btn-primary px-4 py-2 d-block w-100 mt-3">
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
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-8">
        <div v-if="loading">
            <p>Loading data...</p>
        </div>
        <div v-else-if="!property_data">
            <p>No data</p>
        </div>
        <div v-else v-for="pd in property_data" :key=pd.id>
            @include('frontend._components.property_list')
        </div>
        {{-- <div v-else class="card card-danger" v-for="pd in property_data" :key=pd.id>
            <div class="card-header">
                <h3 class="card-title mb-0">Property ID @{{pd.id}}</h3>
            </div>
            <div class="card-body">
                <dl>
                    <dt>Location</dt>
                        <dd>@{{pd.location}}</dd>
                    <dt>Rent Amount </dt>
                        <dd>@{{pd.rent_amount}}</dd>
                    <dt>Surface Area</dt>
                        <dd>@{{pd.surface_area}}</dd>
                </dl>
                <div class="flex justify-content-end">
                    <a id="favorite" type="button" style="color: red" @click="setLikeProperty(pd.id)">
                        <i :class="items.like_property.includes(pd.id) ? 'fas' : 'far' " class="fa-heart fa-2x"></i>
                    </a>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    var root_url = "{{ url('/') }}";

</script>
@endpush

@push('vue-scripts')
<script>
    // ----------------------------------------------------------------------
    // Vuex store - Centralized data
    // ----------------------------------------------------------------------
    store = {
        // ------------------------------------------------------------------
        // Reactive central data
        // ------------------------------------------------------------------
        state: function() {
            var state = {
                // ----------------------------------------------------------
                // Status flags
                // ----------------------------------------------------------
                status: {},
                // ----------------------------------------------------------

                // ----------------------------------------------------------
                // Preset data
                // ----------------------------------------------------------
                preset: {},
                // ----------------------------------------------------------
            };
            // --------------------------------------------------------------

            // --------------------------------------------------------------
            return state;
            // --------------------------------------------------------------
        },
        // ------------------------------------------------------------------

        // ------------------------------------------------------------------
        // Updating state data will need to go through these mutations
        // ------------------------------------------------------------------
        mutations: {}
        // ------------------------------------------------------------------
    };
    // ----------------------------------------------------------------------

    mixin = {
        /*
        ## ------------------------------------------------------------------
        ## VUE DATA
        ## vue data binding, difine a properties
        ## ------------------------------------------------------------------
        */
        data: function() {
            var data = {
                // ----------------------------------------------------------
                // Form result set here
                // ----------------------------------------------------------
                items: {
                    user_id: null,
                    property_count: null,
                    property_data: null,
                    disable: true,
                    loading: false,
                    like_property: [],
                    filter: {
                        surface_min: null,
                        surface_max: null,
                        rent_amount_min: null,
                        rent_amount_max: null,
                        transfer_price_min: null,
                        transfer_price_max: null,
                        name: null,
                        walking_distance: null,
                        undergrounds: [],
                        abovegrounds: [],
                        preferences: [],
                        types: [],
                        skeleton: null,
                        furnished: null,
                        cuisines: [],
                        cities: [],
                        stations: [],
                    }
                },
                // ----------------------------------------------------------
            };
            // --------------------------------------------------------------

            // --------------------------------------------------------------
            return data;
            // --------------------------------------------------------------
        },

        /*
        ## ------------------------------------------------------------------
        ## VUE MOUNTED
        ## vue on mounted state
        ## ------------------------------------------------------------------
        */
        mounted: function() {
            this.getListProperty();
            this.getLikeProperty();
            this.getCountProperty();
            this.items.loading = false;

        },

        created: function() {
            this.getQueryString();
        },

        /*
        ## ------------------------------------------------------------------
        ## VUE COMPUTED
        ## define a property with custom logic
        ## ------------------------------------------------------------------
        */
        computed: {
            property_count: function(){
                return this.items.property_count;
            },
            property_data: function(){
                if(this.items.property_data && this.items.property_data.length > 0){
                    return this.items.property_data;
                } else {
                    return false;
                }
            },
            disabled: function(){
                return this.items.disable;
            },
            loading: function() {
                return this.items.loading;
            },
            filterCity: function(){
                return this.items.filter.cities;
            },
            filterStation: function(){
                return this.items.filter.stations;
            }
        },

        /*
        ## ------------------------------------------------------------------
        ## VUE WATCH
        ## vue reactive data watch
        ## ------------------------------------------------------------------
        */
        watch: {},

        /*
        ## ------------------------------------------------------------------
        ## VUE METHOD
        ## function associated with the vue instance
        ## ------------------------------------------------------------------
        */
        methods: {
            // --------------------------------------------------------------
            refreshParsley: function() {
                setTimeout(() => {
                    if ($('.parsley-errors-list.filled').length > 0) {
                        var $form = $('#property-form');
                        $form.parsley().validate();
                        checkSelect2Class();
                    }
                }, 400);
            },
            getQueryString: function(){
                const url = new URL(window.location.href);
                const queries = new URLSearchParams(url.search);
                const getUndergroundQs = queries.getAll('underground'); //filter for floor underground
                const getUAbovegroundQs = queries.getAll('aboveground'); //filter for floor aboveground
                const getPreferenceQs = queries.getAll('preference'); //filter for property preference
                const getTypesQs = queries.getAll('type'); //filter for property types
                const getCuisineQs = queries.getAll('cuisine');
                const getSurfaceMinQs = queries.get('surface_min');
                const getSurfaceMaxQs = queries.get('surface_max');
                const getRentAmountMinQs = queries.get('rent_amount_min');
                const getRentAmountMaxQs = queries.get('rent_amount_max');
                const getTransferPriceMinQs = queries.get('transfer_price_min');
                const getTransferPriceMaxQs = queries.get('transfer_price_max');
                const getNameQs = queries.get('name');
                const getWalkingDistanceQs = queries.get('walking_distance');
                const getFurnishedQs = queries.get('furnished');
                const getSkeletonQs = queries.get('skeleton');
                const getCityQs = queries.getAll('city');
                const getStationQs = queries.getAll('station');
                console.log("furnished", getFurnishedQs);
                console.log("skeleton", getSkeletonQs);

                if(getSurfaceMinQs != null){
                    this.items.filter.surface_min = getSurfaceMinQs;
                }
                if(getSurfaceMaxQs != null){
                    this.items.filter.surface_max = getSurfaceMaxQs;
                }
                if(getRentAmountMinQs != null){
                    this.items.filter.rent_amount_min = getRentAmountMinQs;
                }
                if(getRentAmountMaxQs != null){
                    this.items.filter.rent_amount_max = getRentAmountMaxQs;
                }
                if(getTransferPriceMinQs != null){
                    this.items.filter.transfer_price_min = getTransferPriceMinQs;
                }
                if(getTransferPriceMaxQs != null){
                    this.items.filter.transfer_price_max = getTransferPriceMaxQs;
                }
                if(getNameQs != null){
                    this.items.filter.name = getNameQs;
                }
                if(getWalkingDistanceQs != null){
                    this.items.filter.walking_distance = getWalkingDistanceQs;
                }
                if(getFurnishedQs != null){
                    this.items.filter.furnished = getFurnishedQs;
                }
                if(getSkeletonQs != null){
                    this.items.filter.skeleton = getSkeletonQs;
                }
                // extract value query string of underground
                if(getUndergroundQs.length > 0){
                    let undergroundSplit = getUndergroundQs[0].split(",") || [];
                        for(under of undergroundSplit){
                            console.log(under);
                            this.items.filter.undergrounds.push(under);
                        }
                }
                // extract value query string of aboveground
                if(getUAbovegroundQs.length > 0){
                    let abovegroundSplit = getUAbovegroundQs[0].split(",") || [];
                        for(above of abovegroundSplit){
                            console.log(above);
                            this.items.filter.abovegrounds.push(above);
                        }
                }
                // extract value query string of property preference
                if(getPreferenceQs.length > 0){
                    let preferencedSplit = getPreferenceQs[0].split(",") || [];
                        for(pref of preferencedSplit){
                            console.log(pref);
                            this.items.filter.preferences.push(pref);
                        }
                }
                // extract value query string of property types
                if(getTypesQs.length > 0){
                    let typesSplit = getTypesQs[0].split(",") || [];
                        for(type of typesSplit){
                            console.log(type);
                            this.items.filter.types.push(type);
                        }
                }
                // extract value query string of cuisine
                if(getCuisineQs.length > 0){
                    let cuisineSplit = getCuisineQs[0].split(",") || [];
                        for(cuisine of cuisineSplit){
                            console.log(cuisine);
                            this.items.filter.cuisines.push(cuisine);
                        }
                }
                // extract value query string of city
                if(getCityQs.length > 0){
                    let citySplit = getCityQs[0].split(",") || [];
                        for(city of citySplit){
                            console.log(city);
                            this.items.filter.cities.push(city);
                        }
                }
                if(getStationQs.length > 0){
                    let stationSplit = getStationQs[0].split(",") || [];
                        for(station of stationSplit){
                            console.log(station);
                            this.items.filter.stations.push(station);
                        }
                }
            },
            getListProperty: function(event) {
                this.items.loading = true;
                let url = window.location.href;
                console.log("url", url);
                let data = new FormData(formElement);
                // if(this.items.filter.cities && this.items.filter.cities.length > 0){
                //     data.append('city', JSON.stringify(this.items.filter.cities));
                // }
                // if(this.items.filter.stations && this.items.filter.stations.length > 0){
                //     data.append('station', JSON.stringify(this.items.filter.stations));
                // }
                axios.post(root_url + '/api/v1/property/getProperties', data)
                    .then((result) => {
                        this.items.property_data = result.data.data.result;
                    }).catch((err) => {
                        console.log(err);
                });
            },
            getCountProperty: function(event) {
                if(this.$refs.skeleton.checked == true && this.$refs.furnished.checked == true){
                    this.items.disable = false;
                } else {
                    this.items.disable = true;
                }
                let data = new FormData(formElement);
                data.append("count", 1);
                // if(this.items.filter.cities && this.items.filter.cities.length > 0){
                //     data.append('city', JSON.stringify(this.items.filter.cities));
                // }
                // if(this.items.filter.stations && this.items.filter.stations.length > 0){
                //     data.append('station', JSON.stringify(this.items.filter.stations));
                // }
                axios.post(root_url + '/api/v1/property/getPropertiesCount', data)
                    .then((result) => {
                        this.items.property_count = result.data.data.count;
                    }).catch((err) => {
                        console.log(err);
                });
            },
            getLikeProperty: function() {
                let local = localStorage.getItem('favoritePropertyId');
                this.items.like_property = JSON.parse(local) || [];
            },
            setLikeProperty: function (id) {
                let propertyID = id;
                var properties_like = [];
                let local = localStorage.getItem('favoritePropertyId');
                properties_like = JSON.parse(local) || [];
                if(properties_like.length > 0 && properties_like.includes(propertyID)){
                    let index = properties_like.indexOf(propertyID);
                    console.log("index", index);
                    properties_like.splice(index, 1);
                    localStorage.setItem('favoritePropertyId', JSON.stringify(properties_like));
                } else {
                    properties_like.push(propertyID);
                    localStorage.setItem('favoritePropertyId', JSON.stringify(properties_like));
                }

                this.getLikeProperty();
            },
            // --------------------------------------------------------------
        }
    }

</script>
@endpush
