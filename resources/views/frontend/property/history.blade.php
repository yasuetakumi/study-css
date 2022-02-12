@extends('backend._base.content_form')

@section('content')
    <div class="row justify-content-center">
        <div class="btn-group border rounded mb-3">
            <button type="button" :class="items.isActiveHistory ? 'btn-primary' : 'btn-default' " class="btn px-4 py-2" @click="switchTab('history')">History</button>
            <button type="button" :class="items.isActiveFavorite ? 'btn-primary' : 'btn-default' " class="btn px-4 py-2" @click="switchTab('favorite')">Favorite</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" v-for="pd in list_properties" :key=pd.id>
            <div class="card card-danger" >
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
            </div>
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
                    list_properties: [],
                    like_property: [],
                    isActiveHistory: false,
                    isActiveFavorite: false,
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
            this.getLikeProperty();
        },

        created: function() {
            let state = 'history';
            this.switchTab(state);
        },

        /*
        ## ------------------------------------------------------------------
        ## VUE COMPUTED
        ## define a property with custom logic
        ## ------------------------------------------------------------------
        */
        computed: {
            list_properties: function(){
                return this.items.list_properties;
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
            getListHistoryOrFavoriteProperty: async function(localKey) {
                let local = localStorage.getItem(localKey);
                let propertyID = JSON.parse(local) || [];
                let data = await axios.post(root_url + '/api/v1/history/getPropertyHistoryOrFavorite', propertyID);
                this.items.list_properties = data.data;
            },
            getLikeProperty: function(){
                let localLikeProperty = localStorage.getItem('favoritePropertyId');
                let likePropertyID = JSON.parse(localLikeProperty) || [];
                this.items.like_property = likePropertyID;
            },
            switchTab: function(state){
                const localKeyHistory = 'visitedPropertyId';
                const localKeyFavorite = 'favoritePropertyId';
                if(state == 'history'){
                    this.items.isActiveFavorite = false;
                    this.items.isActiveHistory = true;
                    this.getListHistoryOrFavoriteProperty(localKeyHistory);
                } else {
                    this.items.isActiveHistory = false;
                    this.items.isActiveFavorite = true;
                    this.getListHistoryOrFavoriteProperty(localKeyFavorite);
                }
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
