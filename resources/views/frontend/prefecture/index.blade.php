@extends("backend._base.app")
@section('content-wrapper')
<div class="container">
    <div class="row d-flex justify-content-center">

        <div class="col-12 mt-5">
            <div class="card rounded-0">

                <div class="card-header bg-white border-bottom-0">
                    <div class="btn-group border rounded mb-3">
                        <button type="button" :class="items.activeTab == 'city' ? 'btn-primary' : 'btn-default'"
                            class="btn px-4 py-2" @click="items.activeTab = 'city'">地域から探す
                        </button>
                        <button type="button" :class="items.activeTab == 'station' ? 'btn-primary' : 'btn-default'"
                            class="btn px-4 py-2" @click="items.activeTab = 'station'">駅から探す
                        </button>
                    </div>
                </div>

                <div v-if="items.activeTab == 'city'">
                    @include('frontend.prefecture.filter.city')
                </div>
                <div v-else-if="items.activeTab == 'station'">
                    @include('frontend.prefecture.filter.station')
                </div>


                <div class="card-header d-flex justify-content-center">
                    <h3 class="card-title mb-0">
                        条件で絞る
                    </h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route('property.filter')}}" method="POST" id="formElement">
                    @csrf
                    {{-- <div style="display: none" v-for="(city, index) in filterCity" :key="index">
                        <input type="hidden" name="city[]" :value="city">
                    </div>
                    <div style="display: none" v-for="(station, index) in filterStation" :key="index">
                        <input type="hidden" name="station[]" :value="station">
                    </div> --}}
                    <div class="card-body clearfix">
                        {{-- Surface Area Filter--}}
                        <div class="search-area mb-3">
                            <p class="border-left border-primary pl-2">@lang('label.surface_area')</p>
                            <div class="row">
                                <div class="col-6">
                                    {{-- <select v-model="items.filter.surface_min" class="form-control" name="surface_min" @change="getCountProperty">
                                        <option :value="null" >下限なし</option>
                                        @foreach ($surface_areas as $surface)
                                        <option value="{{$surface->value}}">{{$surface->label_jp}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="col-6">
                                    {{-- <select v-model="items.filter.surface_max" class="form-control" name="surface_max" @change="getCountProperty">
                                        <option :value="null">上限なし</option>
                                        @foreach ($surface_areas as $surface)
                                        <option value="{{$surface->value}}">{{$surface->label_jp}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            </div>
                        </div>
                        {{-- Rent Price Filter --}}
                        <div class="search-rent mb-3">
                            <p class="border-left border-primary pl-2">@lang('label.rent_amount')</p>
                            <div class="row">
                                <div class="col-6">
                                    {{-- <select v-model="items.filter.rent_amount_min" class="form-control" name="rent_amount_min" id="rent" @change="getCountProperty">
                                        <option :value="null">下限なし</option>
                                        @foreach ($rent_amounts as $rent)
                                        <option value="{{$rent->value}}">{{$rent->label_jp}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="col-6">
                                    {{-- <select v-model="items.filter.rent_amount_max" class="form-control" name="rent_amount_max" id="rent" @change="getCountProperty">
                                        <option :value="null">上限なし</option>
                                        @foreach ($rent_amounts as $rent)
                                        <option value="{{$rent->value}}">{{$rent->label_jp}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            </div>
                        </div>
                        {{-- Search All  Filter--}}
                        <div class="search-all mb-3">
                            <p class="border-left border-primary pl-2">フリーワード</p>
                            <div class="row">
                                <div class="col-12">
                                    {{-- <input v-model="items.filter.name" type="text" name="name" class="form-control" placeholder="恵比寿、山手線、渋谷区など" value="" @change="getCountProperty"> --}}
                                </div>
                            </div>
                        </div>
                        {{-- Walking Distance Filter --}}
                        <div class="search-walking-distance mb-3">
                            <p class="border-left border-primary pl-2">@lang('label.walking_distance_from_station')</p>
                            <div class="row">
                                <div class="col-6">
                                    {{-- <select v-model="items.filter.walking_distance" class="form-control" name="walking_distance" @change="getCountProperty">
                                        <option :value="null">選択なし</option>
                                        @foreach ($walking_distances as $walking)
                                        <option value="{{$walking->value}}">{{$walking->label_jp}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            </div>
                        </div>
                        {{-- Floor Underground Filter --}}
                        <div class="search-underground-floor mb-3">
                            <p class="border-left border-primary pl-2">@lang('label.number_of_floor_underground')</p>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        {{-- @foreach ($floor_undergrounds as $underground)
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input v-model="items.filter.undergrounds" class="form-check-input" name="floor_under[]" type="checkbox" value="{{$underground->value}}" id="floor-under-{{$underground->id}}" @change="getCountProperty">
                                                <label for="floor-under-{{$underground->id}}" class="form-check-label">{{$underground->label_jp}}</label>
                                            </div>
                                        </div>
                                        @endforeach --}}
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
                                        {{-- @foreach ($floor_abovegrounds as $above)
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input v-model="items.filter.abovegrounds" class="form-check-input" name="floor_above[]" type="checkbox" value="{{$above->value}}" id="floor-above-{{$above->id}}" @change="getCountProperty">
                                                <label for="floor-above-{{$above->id}}" class="form-check-label">{{$above->label_jp}}</label>
                                            </div>
                                        </div>
                                        @endforeach --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Property Preference Filter --}}
                        <div class="search-property-preference mb-3">
                            <p class="border-left border-primary pl-2">@lang('label.property_preference')</p>
                            <div class="row">
                                <div class="col-12">
                                    {{-- @foreach ($property_preferences as $pp)
                                    <div class="form-check">
                                        <input v-model="items.filter.preferences" class="form-check-input" name="property_preference[]" type="checkbox" value="{{$pp->id}}" @change="getCountProperty">
                                        <label class="form-check-label">{{$pp->label_jp}}</label>
                                    </div>
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
                        {{-- Property Type Filter --}}
                        <div class="search-property-type mb-3">
                            <p class="border-left border-primary pl-2">@lang('label.property_types')</p>
                            <div class="row">
                                <div class="col-12">
                                    {{-- @foreach ($property_types as $pt)
                                    <div class="form-check">
                                        <input v-model="items.filter.types" class="form-check-input" name="property_type[]" type="checkbox" value="{{$pt->id}}" @change="getCountProperty">
                                        <label class="form-check-label">{{$pt->label_jp}}</label>
                                    </div>
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
                        {{-- Is Skeleton Filter --}}
                        <div class="search-is-skeleton mb-3">
                            <p class="border-left border-primary pl-2">@lang('label.skeleton')</p>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-check">
                                        {{-- <input v-model="items.filter.skeleton" class="form-check-input" ref="skeleton" name="skeleton" value="0" type="checkbox" @change="getCountProperty"> --}}
                                        <label class="form-check-label">スケルトン物件</label>
                                    </div>
                                    <div class="form-check">
                                        {{-- <input v-model="items.filter.furnished" class="form-check-input" ref="furnished" name="furnished" value="1" type="checkbox" @change="getCountProperty"> --}}
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
                                                {{-- @foreach ($cuisines as $cu)
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input v-model="items.filter.cuisines" class="form-check-input" name="cuisine[]" type="checkbox" value="{{$cu->id}}" id="cuisine-{{$cu->id}}" @change="getCountProperty">
                                                            <label for="cuisine-{{$cu->id}}" class="form-check-label">{{$cu->label_jp}}</label>
                                                        </div>
                                                    </div>
                                                @endforeach --}}
                                            </div>
                                        </div>
                                        <hr>
                                        {{-- Transfer Price Option --}}
                                        <div class="search-walking-distance mb-3">
                                            <p class="border-left border-primary pl-2">@lang('label.transfer_price_option')</p>
                                            <div class="row">
                                                <div class="col-4">
                                                    {{-- <select v-model="items.filter.transfer_price_min" class="form-control" name="transfer_price_min" @change="getCountProperty">
                                                        <option :value="null">選択なし</option>
                                                        @foreach ($transfer_price_options as $opt)
                                                        <option value="{{$opt->value}}">{{$opt->label_jp}}</option>
                                                        @endforeach
                                                    </select> --}}
                                                </div>
                                                <div class="col-4">
                                                    {{-- <select v-model="items.filter.transfer_price_max" class="form-control" name="transfer_price_max" @change="getCountProperty">
                                                        <option :value="null">選択なし</option>
                                                        @foreach ($transfer_price_options as $opt)
                                                        <option value="{{$opt->value}}">{{$opt->label_jp}}</option>
                                                        @endforeach
                                                    </select> --}}
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
        </div>

        <div class="col-12 mt-5">
            @include('frontend.prefecture.list.property')
        </div>

    </div>
</div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('css/frontend/app.css')}}">
@endpush
@push('scripts')
    <script type="text/javascript"> var root_url = "{{ url('/') }}";</script>
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
        state: function(){
            var state = {
                // ----------------------------------------------------------
                // Status flags
                // ----------------------------------------------------------
                status: { },
                // ----------------------------------------------------------

                // ----------------------------------------------------------
                // Preset data
                // ----------------------------------------------------------
                preset: {
                },
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
        data: function(){
            var data = {
                // ----------------------------------------------------------
                // Form result set here
                // ----------------------------------------------------------
                items: {
                    activeTab: 'city',
                    station_line_id: null,
                    cities: @json($cities),
                    list_stations: null,
                    loading: false,
                    select_all: [],
                    selectedCities: [],
                    stations: [],
                    checkall: false,
                    uncheckall: false,
                    property_count: null,
                    property_count_station: null,
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
        mounted: function(){
            this.checkAllCity('checkall');
        },

        created: function(){
            if(@json($initial_station_line)){
                this.items.station_line_id = @json($initial_station_line->id);
            }
        },

        /*
        ## ------------------------------------------------------------------
        ## VUE COMPUTED
        ## define a property with custom logic
        ## ------------------------------------------------------------------
        */
        computed: {
            stations: function () {
                if(this.items.list_stations && this.items.list_stations.length > 0){
                    return this.items.list_stations;
                }else {
                    return false;
                }

            },
            property_count: function () {
                if(this.items.property_count && this.items.property_count > 0){
                    return this.items.property_count;
                } else{
                    return false;
                }
            },
            property_count_station: function () {
                return this.items.property_count_station;
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
            changeStationByStationLine: function (event) {
                console.log(event.target.value);
                this.items.station_line_id = event.target.value;

                // Uncheck selected station from previous station line
                // This request alse include property count
                this.checkAllStations('uncheckall');
                this.getStationByStationLine();

            },
            getStationByStationLine: async function () {
                this.items.loading = true;
                let response = await axios.get(root_url + '/api/v1/station/getStationByStationLine/' +  this.items.station_line_id);
                console.log(response.data);
                this.items.list_stations = response.data;
                this.items.loading = false;
            },
            checkAllCity: function(value) {
                // Default value (no city selected)
                this.items.selectedCities = [];

                // Check all city
                if (value == 'checkall') {
                    this.items.cities.forEach(city => {
                        this.items.selectedCities.push(city.id);
                    });
                }

                // Get number of property belongs to selected city
                setTimeout(() => {
                    this.getPropertyCountByCity();
                }, 200);
            },
            checkAllStations: function (value) {
                console.log(value);
                this.items.stations = [];
                if(value == 'checkall'){
                    for (station in this.items.list_stations){
                        this.items.stations.push(this.items.list_stations[station].id)
                    }
                }
                setTimeout(() => {
                    this.getPropertyCountByStation();
                }, 200);
            },
            getPropertyCountByCity: function () {
                let data = new FormData(formElement);
                axios.post(root_url + '/api/v1/property/getPropertyCountByCity', data)
                    .then((result) => {
                        this.items.property_count = result.data;
                        console.log(result.data);
                    }).catch((err) => {
                        console.log(err);
                });
            },
            getPropertyCountByStation: async function () {
                let data2 = new FormData(propertyByStation);
                axios.post(root_url + '/api/v1/property/getPropertyCountByStation', data2)
                    .then((result) => {
                        this.items.property_count_station = result.data;
                        console.log("responded", result.data);
                    }).catch((err) => {
                        console.log(err);
                });
            }
            // --------------------------------------------------------------
        }
    }
</script>
@endpush

