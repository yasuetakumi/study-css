<script type="text/x-template" id="property-list-tpl">
    <a :href="routeToPropertyDetail">
        <div class="card card-secondary">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="text-black mb-0">@{{cityName}}
                            (@{{stationName}}駅　徒歩@{{distanceMinutes}}) の貸店舗</p>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <div class="card-body p-2">
                <div class="row">
                    <div class="col-5">
                        <div class="position-relative">
                            <img class="w-100" :src="path + property.thumbnail_image_main" v-on:error="handleImageNotFound" alt="thumbnail">
                            <div class="position-absolute" style="top:3px; left:0px">
                                <span class="p-1 bg-secondary rounded-sm">
                                    @{{labelImage}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <dl>
                            <dt class="text-dark">@{{ closestStationDistance }} </dt>
                            <dt class="text-info">賃料／坪単価 <span class="text-dark">@{{man}} / @{{manPerTsubo}}</span></dt>
                            <dt class="text-info">面積 <span class="text-dark">@{{rent_amount}} / @{{manPerTsubo}}</span></dt>
                            <dt class="text-info">所在地 <span class="text-dark">@{{property.location}}</span></dt>
                            <dt class="text-info">前業態／希望譲渡料 <span class="text-dark">@{{cuisineOrTransfer}}</span></dt>
                        </dl>
                    </div>
                </div>
                <slot></slot>
            </div>
        </div>
    </a>
</script>
<script>
    Vue.component('PropertyList', {

        // Template name
        template: '#property-list-tpl',

        // Aavailable properties
        props: {
            property: { required: true, default: null },
        },

        // Computed properties
        computed: {
            path: function(){
                let asset = @json(asset('uploads'));
                return asset + '/';
            },
            cityName: function(){
                return this.property.city.display_name;
            },
            stationName: function(){
                if(this.property.property_stations[0] != null){
                    return this.property.property_stations[0].station.display_name;
                } else {
                    return '';
                }
            },
            distanceMinutes: function(){
                if(this.property.property_stations[0] != null){
                    return this.property.property_stations[0].walking_distance.value + '分';
                } else {
                    return '';
                }
            },
            labelImage: function(){
                if(this.property.is_skeleton == 1){
                    return 'スケルトン';
                } else {
                    return '居抜き';
                }
            },
            stationLineName: function(){
                if(this.property.property_stations[0] != null){
                    return this.property.property_stations[0].station.station_line.display_name;
                } else {
                    return '';
                }
            },
            cuisineOrTransfer: function(){
                if(this.property.is_skeleton == 0){
                    return this.property.cuisine.label_jp;
                } else {
                    return this.property.interior_transfer_price;
                }
            },
            closestStationDistance: function(){
                return this.stationLineName + "　" + this.stationName + "　" + "徒歩" + this.distanceMinutes;
            },
            manPerTsubo: function(){
                return this.property.man_per_tsubo + '円';
            },
            man: function(){
                return this.property.man;
            },
            rent_amount: function(){
                return this.property.rent_amount + '㎡';
            },
            routeToPropertyDetail(){
                let routeBase = @json(url('/'));
                let routeWithParam = routeBase + '/properties/' + this.property.id
                return routeWithParam;
            }
        },
        methods: {
            handleImageNotFound: function(event){
                let noimage = @json(asset('img/backend/noimage.png'));
                event.target.src = noimage;
            },
        },

    });
</script>
