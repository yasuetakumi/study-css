@extends("backend._base.app")
@section('content-wrapper')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-12 mt-5">
            <div class="card rounded-0">
                <div class="card-header bg-white border-bottom-0">
                    <h3 class="card-title mb-0">市区町村で絞り込む</h3>
                </div>
                <hr class="my-0 mx-2">
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('property.filter')}}" method="POST" id="formElement">
                        @csrf
                        <input type="hidden" name="prefecture_id" value="{{ $prefecture->id }}">
                        <div class="row">
                            @foreach ($cities as $city)
                                <div class="col-lg-2 col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" value="{{$city->id}}" name="city[]" type="checkbox" @change="getPropertyCountByCity">
                                        <label class="form-check-label">{{$city->display_name}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <span v-if="property_count" style="font-size: 18px; margin-right: 10px;">@{{property_count}}</span>
                                    <span v-else style="font-size: 18px; margin-right: 10px;">0</span>
                                    <span>件の該当物件</span>
                                </div>
                                <button type="submit" class="btn btn-danger px-2 py-2 rounded-0">チェックした市区町村で絞り込む</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-12 mt-5">
            <div class="card rounded-0">
                <div class="card-header bg-white border-bottom-0">
                    <h3 class="card-title mb-0">路線で絞り込む</h3>
                    <!-- /.card-tools -->
                </div>
                <hr class="my-0 mx-2">
                <!-- /.card-header -->
                <form action="{{route('property.filter')}}" method="POST" id="propertyByStation">
                    @csrf
                    <input type="hidden" name="prefecture_id" value="{{ $prefecture->id }}">
                    <div class="card-body">
                        <div class="row mb-4">
                            @foreach ($station_lines as $station)
                                <div class="col-lg-2 col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" value="{{$station->id}}" name="station_line" type="radio" @change="changeStationByStationLine">
                                        <label class="form-check-label">{{$station->display_name}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <p style="font-size: 18px;">駅を選ぶ(複数選択)</p>
                        <hr class="mx-2 my-0">
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="d-flex py-3">
                                    <div class="form-check mr-4">
                                        <input id="checkall" class="form-check-input" value="checkall" name="checkall" type="radio" @change="checkAll">
                                        <label class="form-check-label">すべて選択</label>
                                    </div>
                                    <div class="form-check">
                                        <input id="uncheckall" class="form-check-input" value="uncheckall" name="checkall" type="radio" @change="checkAll">
                                        <label class="form-check-label">すべて選択解除</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12" v-if="items.loading">
                                Loading Data...
                            </div>
                            <div class="col-12" v-else-if="!stations">
                                No Data
                            </div>
                            <div v-else class="col-lg-2 col-6" v-for="station in stations" :key="station.id">
                                <div class="form-check">
                                    <input class="form-check-input" :value="station.id" name="station[]" type="checkbox" v-model="items.stations" @change="getPropertyCountByStation">
                                    <label class="form-check-label">@{{station.display_name}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <span  style="font-size: 18px; margin-right: 10px;">@{{property_count_station}}</span>
                            {{-- <span v-else style="font-size: 18px; margin-right: 10px;">0</span> --}}
                            <span>件の該当物件</span>
                        </div>
                        <button type="submit" class="btn btn-danger px-2 py-2 rounded-0">チェックした駅で絞り込む</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-12 mt-5">
            <div class="card rounded-0">
                <div class="card-header bg-white border-bottom-0">
                    <h3 class="card-title mb-0">List Property In {{$prefecture->display_name}}</h3>
                </div>
                <hr class="my-0 mx-2">
                <!-- /.card-header -->
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
            <!-- /.card -->
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
                    station_line_id: null,
                    list_stations: null,
                    loading: false,
                    select_all: [],
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
            this.getPropertyCountByCity();
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
                this.getStationByStationLine();
                document.getElementById('checkall').checked = false;
                document.getElementById('uncheckall').checked = false;

            },
            getStationByStationLine: async function () {
                this.items.loading = true;
                let response = await axios.get(root_url + '/api/v1/station/getStationByStationLine/' +  this.items.station_line_id);
                console.log(response.data);
                this.items.list_stations = response.data;
                this.items.loading = false;
            },
            checkAll: function (event) {
                this.items.stations = [];
                if(event.target.value == 'checkall'){
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

