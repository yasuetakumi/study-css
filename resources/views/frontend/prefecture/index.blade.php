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

