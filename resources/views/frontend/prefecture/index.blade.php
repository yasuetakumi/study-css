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

                <form action="{{route('property.filter')}}" method="POST">
                    @csrf

                    <div v-if="items.activeTab == 'city'">
                        @include('frontend.prefecture.filter.city')
                    </div>
                    <div v-else-if="items.activeTab == 'station'">
                        @include('frontend.prefecture.filter.station')
                    </div>

                    @include('frontend.prefecture.filter.other')
                </form>

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
    // -------------------------------------------------------------------------
    // Vuex store - Centralized data
    // -------------------------------------------------------------------------
    store = {
        // ---------------------------------------------------------------------
        // Reactive central data
        // ---------------------------------------------------------------------
        state: function(){
            var state = {
                // -------------------------------------------------------------
                // Status flags
                // -------------------------------------------------------------
                status: { },
                // -------------------------------------------------------------

                // -------------------------------------------------------------
                // Preset data
                // -------------------------------------------------------------
                preset: {
                },
                // -------------------------------------------------------------
            };
            // -----------------------------------------------------------------

            // -----------------------------------------------------------------
            return state;
            // -----------------------------------------------------------------
        },
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // Updating state data will need to go through these mutations
        // ---------------------------------------------------------------------
        mutations: {}
        // ---------------------------------------------------------------------
    };
    // -------------------------------------------------------------------------

    mixin = {
        // ---------------------------------------------------------------------
        // VUE DATA
        // vue data binding, difine a properties
        // ---------------------------------------------------------------------
        data: function(){
            var data = {
                // -------------------------------------------------------------
                // Initial data
                // -------------------------------------------------------------
                initial: {
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
                        city: [],
                        station: [],
                    },
                },
                // -------------------------------------------------------------

                // -------------------------------------------------------------
                // Form result set here
                // -------------------------------------------------------------
                items: {
                    activeTab: 'city',
                    floorType: 0, // aboveground
                    station_line_id: null,
                    cities: @json($cities),
                    list_stations: null,
                    loading: false,
                    select_all: [],
                    selectedCities: [],
                    stations: [],
                    checkall: false,
                    uncheckall: false,
                    number_of_property: 0,
                },
                // -------------------------------------------------------------
            };
            // -----------------------------------------------------------------

            // -----------------------------------------------------------------
            data.items.filter = _.cloneDeep(data.initial.filter);
            // -----------------------------------------------------------------

            // -----------------------------------------------------------------
            return data;
            // -----------------------------------------------------------------
        },
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // VUE MOUNTED
        // vue on mounted state
        // ---------------------------------------------------------------------
        mounted: function(){
            this.checkAllCity('checkall');
        },
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        created: function(){
            if(@json($initial_station_line)){
                this.items.station_line_id = @json($initial_station_line->id);
            }
        },
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // VUE COMPUTED
        // define a property with custom logic
        // ---------------------------------------------------------------------
        computed: {
            stations: function () {
                if(this.items.list_stations && this.items.list_stations.length > 0){
                    return this.items.list_stations;
                }else {
                    return false;
                }
            },
        },
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // VUE WATCH
        // vue reactive data watch
        // ---------------------------------------------------------------------
        watch: {
            // -----------------------------------------------------------------
            'items': {
                deep: true,
                handler: function (items) {
                    // Assign filter to new variable
                    let filter = _.cloneDeep(items.filter)

                    // Delete unnecessary filter property
                    Vue.delete(filter, 'undergrounds');
                    Vue.delete(filter, 'abovegrounds');
                    Vue.delete(filter, 'preferences');
                    Vue.delete(filter, 'types');

                    // Assign selected city and station to filter
                    filter.city = items.activeTab == 'city' ? _.cloneDeep(this.items.selectedCities) : [];
                    filter.station = items.activeTab == 'station' ? _.cloneDeep(this.items.stations) : [];
                    filter.count = true;

                    // Set skeleton filter
                    filter.skeleton = items.filter.skeleton ? 0 : null;
                    filter.furnished = items.filter.furnished ? 1 : null;

                    // Assign data to filter
                    if (items.filter.undergrounds.length) filter.floor_under = items.filter.undergrounds;
                    if (items.filter.abovegrounds.length) filter.floor_above = items.filter.abovegrounds;
                    if (items.filter.preferences.length) filter.property_preference = items.filter.preferences;
                    if (items.filter.types.length) filter.property_type = items.filter.types;

                    // Get number of property
                    this.getNumberOfProperty(filter);
                },
            },
            // -----------------------------------------------------------------
        },
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // VUE METHOD
        // function associated with the vue instance
        // ---------------------------------------------------------------------
        methods: {
            // -----------------------------------------------------------------
            changeStationByStationLine: function (event) {
                this.items.station_line_id = event.target.value;

                // Uncheck selected station from previous station line
                // This request alse include property count
                this.checkAllStations('uncheckall');
                this.getStationByStationLine();
            },
            // -----------------------------------------------------------------
            getStationByStationLine: async function () {
                this.items.loading = true;
                let response = await axios.get(root_url + '/api/v1/station/getStationByStationLine/' +  this.items.station_line_id);
                this.items.list_stations = response.data;
                this.items.loading = false;
            },
            // -----------------------------------------------------------------
            checkAllCity: function(value) {
                // Default value (no city selected)
                this.items.selectedCities = [];

                // Check all city
                if (value == 'checkall') {
                    this.items.cities.forEach(city => {
                        this.items.selectedCities.push(city.id);
                    });
                }
            },
            // -----------------------------------------------------------------
            checkAllStations: function (value) {
                this.items.stations = [];
                if(value == 'checkall'){
                    for (station in this.items.list_stations){
                        this.items.stations.push(this.items.list_stations[station].id)
                    }
                }
            },
            // -----------------------------------------------------------------
            changeFloorType: function(value) {
                this.items.filter.floorType = !value;
                this.items.filter.abovegrounds = [];
                this.items.filter.undergrounds = [];
            },
            // -----------------------------------------------------------------
            getNumberOfProperty: function(filter) {
                let request = axios.post(root_url + '/api/v1/property/getPropertiesCount', filter);
                request.then((result) => {
                    this.items.number_of_property = result.data.data.count ?? 0;
                });
                request.catch((err) => {
                    console.log(err);
                });
            },
            // -----------------------------------------------------------------
            clearFilter: function() {
                this.items.selectedCities = [];
                this.items.stations = [];
                this.items.filter = _.cloneDeep(this.initial.filter);
            },
            // -----------------------------------------------------------------
        }
        // ---------------------------------------------------------------------
    }
</script>
@endpush

