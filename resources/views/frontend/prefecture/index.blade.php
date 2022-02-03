@extends("backend._base.app")
@section('content-wrapper')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card rounded-0">
                <div class="card-header bg-white border-bottom-0">
                    <h3 class="card-title mb-0">市区町村で絞り込む</h3>
                </div>
                <hr class="my-0 mx-2">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        @foreach ($cities as $city)
                            <div class="col-lg-2 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" value="{{$city->id}}" name="cities[]" type="checkbox">
                                    <label class="form-check-label">{{$city->display_name}}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <a class="btn btn-danger px-2 py-2 rounded-0" href="#">チェックした市区町村で絞り込む</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-8 mt-5">
            <div class="card rounded-0">
                <div class="card-header bg-white border-bottom-0">
                    <h3 class="card-title mb-0">経路で絞り込む</h3>
                    <!-- /.card-tools -->
                </div>
                <hr class="my-0 mx-2">
                <!-- /.card-header -->
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
                                    <input class="form-check-input" value="1" name="checkall" type="checkbox">
                                    <label class="form-check-label">すべて選択</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="0" name="uncheckall" type="checkbox">
                                    <label class="form-check-label">すべて選択解除</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div v-if="items.loading">
                            Loading Data...
                        </div>
                        <div v-else class="col-lg-2 col-6" v-for="station in stations" :key="station.id">
                            <div class="form-check">
                                <input class="form-check-input" :value="station.id" name="station" type="checkbox">
                                <label class="form-check-label">@{{station.display_name}}</label>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-danger px-2 py-2 rounded-0" href="#">チェックした駅で絞り込む</a>
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
            if(@json($initial_station_line)){
                this.items.station_line_id = @json($initial_station_line->id);
                this.getStationByStationLine();
            }

        },

        created: function(){

        },

        /*
        ## ------------------------------------------------------------------
        ## VUE COMPUTED
        ## define a property with custom logic
        ## ------------------------------------------------------------------
        */
        computed: {
            stations: function () {
                return this.items.list_stations;
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
                this.getStationByStationLine()
            },
            getStationByStationLine: async function () {
                this.items.loading = true;
                let response = await axios.get(root_url + '/api/v1/station/getStationByStationLine/' +  this.items.station_line_id);
                console.log(response.data);
                this.items.list_stations = response.data;
                this.items.loading = false;
            }
            // --------------------------------------------------------------
        }
    }
</script>
@endpush

