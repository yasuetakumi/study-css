<script type="text/x-template" id="station-city-modal">
    <div class="modal fade" id="stationCityModal" tabindex="-1" aria-labelledby="stationCityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stationCityModalLabel">都道府県</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close" ref="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header bg-white border-bottom-0">
                                    <div class="btn-group border rounded mb-3">
                                        <button type="button" :class="items.activeTab == 'city' ? 'btn-primary' : 'btn-default'" class="btn px-4 py-2"
                                            @click="items.activeTab = 'city'">地域から探す
                                        </button>
                                        <button type="button" :class="items.activeTab == 'station' ? 'btn-primary' : 'btn-default'" class="btn px-4 py-2"
                                            @click="items.activeTab = 'station'">駅から探す
                                        </button>
                                    </div>
                                </div>
                                <form action="{{route('property.filter')}}" method="POST">
                                    @csrf
                                    {{-- -------------------------------------------------------------
                                    Input filter data hidden
                                    ------------------------------------------------------------- --}}
                                    <input type="hidden" name="surface_min" :value="filterAffected.surface_min">
                                    <input type="hidden" name="surface_max" :value="filterAffected.surface_max">
                                    <input type="hidden" name="rent_amount_min" :value="filterAffected.rent_amount_min">
                                    <input type="hidden" name="rent_amount_max" :value="filterAffected.rent_amount_max">
                                    <input type="hidden" name="name" :value="filterAffected.name">
                                    <input type="hidden" name="walking_distance" :value="filterAffected.walking_distance">
                                    <input type="hidden" name="floor_under[]" :value="filterAffected.undergrounds">
                                    <input type="hidden" name="floor_above[]" :value="filterAffected.abovegrounds">
                                    <input type="hidden" name="property_preference[]" :value="filterAffected.preferences">
                                    <input type="hidden" name="property_type[]" :value="filterAffected.types">
                                    <input type="hidden" name="skeleton" :value="filterAffected.skeleton">
                                    <input type="hidden" name="furnished" :value="filterAffected.furnished">
                                    <input type="hidden" name="transfer_price_min" :value="filterAffected.transfer_price_min">
                                    <input type="hidden" name="transfer_price_max" :value="filterAffected.transfer_price_max">

                                    <div v-if="items.activeTab === 'city'">
                                        <template>
                                            <div class="card-header bg-white border-bottom-0">
                                                <h3 class="card-title mb-0">市区町村で絞り込む</h3>
                                            </div>

                                            <hr class="my-0 mx-2">

                                            <div class="card-body">
                                                <input type="hidden" name="prefecture_id" :value="prefecture">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="d-flex py-3">
                                                            <div class="mr-4">
                                                                <button type="button" class="btn btn-danger px-2 py-2 rounded-0"
                                                                    @click="checkAllCity('checkall')">すべて選択</button>
                                                            </div>
                                                            <div>
                                                                <button type="button" class="btn btn-danger px-2 py-2 rounded-0"
                                                                    @click="checkAllCity('uncheckall')">すべて選択解除</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div v-if="items.loadingCities">
                                                        <div class="col-12">
                                                            <div class="text-center">
                                                                <div class="spinner-border text-primary" role="status">
                                                                    <span class="sr-only">Loading...</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12" v-else-if="!items.loadingCities && !items.cities">
                                                        No Data
                                                    </div>
                                                    <div v-else v-for="(city, cityIndex) in items.cities" class="col-lg-2 col-6">
                                                        <div class="form-check">
                                                            <input :id="'city-'+city.id" v-model="items.selectedCities" class="form-check-input city-input" :value="city.id" name="city[]" type="checkbox">
                                                            <label :for="'city-'+city.id" class="form-check-label">@{{ city.display_name }} (@{{ city.properties_count }})</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>

                                    <div v-if="items.activeTab === 'station' ">
                                        <template>
                                            <div class="card-header bg-white border-bottom-0">
                                                <h3 class="card-title mb-0">路線で絞り込む</h3>
                                            </div>

                                            <hr class="my-0 mx-2">


                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <div class="col-lg-2 col-6" v-for="station in items.stationLines" :key="station.id">
                                                        <div class="form-check">
                                                            <input :id="'station-'+station.id" class="form-check-input" :value="station.id" name="station_line" type="radio" @change="changeStationByStationLine">
                                                            <label :for="'station-'+station.id" class="form-check-label">@{{station.display_name}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p style="font-size: 18px;">駅を選ぶ(複数選択)</p>
                                                <hr class="mx-2 my-0">
                                                <div class="row mb-4">
                                                    <div class="col-12">
                                                        <div class="d-flex py-3">
                                                            <div class="mr-4">
                                                                <button @click="checkAllStations('checkall')" type="button" class="btn btn-danger px-2 py-2 rounded-0">すべて選択</button>
                                                            </div>
                                                            <div>
                                                                <button @click="checkAllStations('uncheckall')" type="button" class="btn btn-danger px-2 py-2 rounded-0">すべて選択解除</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-12" v-if="items.loadingStations">
                                                        <div class="text-center">
                                                            <div class="spinner-border text-primary" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12" v-else-if="!items.loadingStations && !items.stations">
                                                        No Data
                                                    </div>
                                                    <div v-else class="col-lg-2 col-6" v-for="station in items.stations" :key="station.id">
                                                        <div class="form-check">
                                                            <input :id="'station2-'+station.id" class="form-check-input" :value="station.id" name="station[]" type="checkbox" v-model="items.selectedStations">
                                                            <label :for="'station2-'+station.id" class="form-check-label">@{{station.display_name}} (@{{ station.properties_count }})</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                    <div class="row justify-content-end mr-3 mb-3">
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-danger">検索する</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script>
    Vue.component('StationCityModal', {
        // Template name
        template: '#station-city-modal',
        props: ['prefecture', 'filters'],
        data() {
            return {
                items: {
                    activeTab: 'city',
                    cities: [],
                    stations: [],
                    stationLines: [],
                    loadingCities: false,
                    loadingStations: false,
                    loadingStationLines: false,
                    baseUrl: root_url,
                    selectedCities: [],
                    selectedStations: [],
                    selectedStationLine: null,
                },
            }
        },
        mounted() {
            this.getCities();
            this.getStationLines();
        },
        watch: {
            prefecture: function() {
                this.getCities();
                this.getStationLines();
            }
        },
        computed: {
            filterAffected() {
                let filter = this.filters;
                // delete filter.cities if exist (it will be set from this component)
                if (filter.cities) {
                    delete filter.cities;
                }
                // delete filter.stations if exist (it will be set from this component)
                if (filter.stations) {
                    delete filter.stations;
                }
                // push object to array filter
                filter.cities = this.items.selectedCities;
                filter.stations = this.items.selectedStations;
                return filter;
            }
        },
        methods: {
            async getCities() {
                this.items.loadingCities = true;
                const response = await axios.get(this.items.baseUrl + '/api/v1/city/getCityByPrefecture/' + this.prefecture);
                this.items.cities = response.data;
                this.items.loadingCities = false;
            },
            async getStationLines() {
                this.items.loadingStationLines = true;
                const response = await axios.get(root_url + '/api/v1/station/getStationLineByPrefecture/' + this.prefecture);
                this.items.stationLines = response.data;
                this.items.loadingStationLines = false;
            },
            async getStationsByStationLine() {
                this.items.loadingStations = true;
                const response = await axios.get(root_url + '/api/v1/station/getStationByStationLine/' +  this.items.selectedStationLine + '/' + this.prefecture);
                this.items.stations =  response.data;
                this.items.loadingStations = false;
            },
            changeStationByStationLine(event){
                this.items.selectedStationLine = event.target.value;
                this.getStationsByStationLine();
            },
            checkAllCity(value) {
                // Default value (no city selected)
                this.items.selectedCities = [];

                // Check all city
                if (value == 'checkall') {
                    this.items.cities.forEach(city => {
                        this.items.selectedCities.push(city.id);
                    });
                }
            },
            checkAllStations(value) {
                // Default value (no station selected)
                this.items.selectedStations = [];

                // Check all station
                if (value == 'checkall') {
                    this.items.stations.forEach(station => {
                        this.items.selectedStations.push(station.id);
                    });
                }
            },
        }
    });
</script>
