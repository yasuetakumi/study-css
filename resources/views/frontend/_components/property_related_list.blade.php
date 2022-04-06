<script type="text/x-template" id="property-related-list-tpl">
    <div class="row px-4 py-3 border-bottom">
        <div class="col-4 px-1">
            <img class="w-100 py-1" :src="path + property.thumbnail_image_main" v-on:error="handleImageNotFound" alt="thumbnail">
        </div>
        <div class="col-8 px-1">
            <a :href="routeToPropertyDetail" class="text-justify text-link">@{{titleLink}}</a>
        </div>
    </div>
</script>

<script>
    Vue.component('PropertyRelatedList', {

        // Template name
        template: '#property-related-list-tpl',

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
            titleLink: function(){
                return this.property.location + '/' + this.property.tsubo + '/' + this.property.property_stations[0].station.display_name + '駅 ' +  this.property.property_stations[0].walking_distance.value + '分';
            },
            routeToPropertyDetail: function(){
                let route = @json(url('/properties/'));
                return route + '/' + this.property.id;
            }
        },
        methods: {
            handleImageNotFound: function(event){
                let noimage = @json(asset('img/backend/noimage.png'));
                event.target.src = noimage;
            },

        }

    });
</script>
