@extends('backend._base.content_form')

@section('content')

    <!-- Modal -->
    <div v-if="items.confirmDelete">
        <div style="position: fixed; z-index: 10; top: 0; left: 0; width:100%; height: 100%; overflow:hidden; padding-top:10px; background-color: rgba(0,0,0,0.4);">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card p-3 bg-dark">
                        <p class="text-white">削除してもよろしいですか？</p>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-dark mr-2 border border-white" id="buttonYes" ref="buttonYes" @click="deleteFavorite(true)">
                                確認
                            </button>
                            <button class="btn btn-dark border border-white" id="buttonNo" ref="buttonNo" @click="deleteFavorite(false)">
                                キャンセル
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="btn-group border rounded mb-3">
            <button type="button" :class="items.isActiveHistory ? 'btn-primary' : 'btn-default' " class="btn px-4 py-2"
                @click="switchTab('history')">History</button>
            <button type="button" :class="items.isActiveFavorite ? 'btn-primary' : 'btn-default' " class="btn px-4 py-2"
                @click="switchTab('favorite')">Favorite</button>
        </div>
    </div>
    <div class="text-right" v-if="items.isActiveHistory">
        <button type="button" class="btn btn-danger" @click="clearHistory">
            履歴の消去
        </button>
    </div>
    <hr>
    <div class="row">
        <div class="w-100" v-if="!list_history && items.isActiveHistory">
            <p class="text-center">No data</p>
        </div>
        <div class="w-100" v-else-if="!list_favorite && items.isActiveFavorite">
            <p class="text-center">No data</p>
        </div>
        <div v-else-if="list_favorite && items.isActiveFavorite" class="col-md-4" v-for="pd in list_favorite"
            :key="pd.id">
            @include('frontend._components.property_list')
        </div>
        <div v-else class="col-md-4" v-for="pd in list_history" :key="pd.id">
            @include('frontend._components.property_list')
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
                        list_properties_history: [],
                        list_properties_favorite: [],
                        like_property: [],
                        isActiveHistory: false,
                        isActiveFavorite: false,
                        confirmDelete: false,
                        selectedIdFavorite: null,
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
                const url = new URL(window.location.href);
                const queries = new URLSearchParams(url.search);
                const favorite = queries.get("favorite");
                console.log(favorite);
                let state = 'history'
                if(favorite != null){
                    state = 'favorite';
                }
                this.switchTab(state);
            },

            /*
            ## ------------------------------------------------------------------
            ## VUE COMPUTED
            ## define a property with custom logic
            ## ------------------------------------------------------------------
            */
            computed: {
                list_history: function() {
                    if (this.items.list_properties_history && this.items.list_properties_history.length > 0) {
                        return this.items.list_properties_history;
                    } else {
                        return false;
                    }
                },
                list_favorite: function() {
                    if (this.items.list_properties_favorite && this.items.list_properties_favorite.length > 0) {
                        return this.items.list_properties_favorite;
                    } else {
                        return false;
                    }
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
                    let data = await axios.post(root_url + '/api/v1/history/getPropertyHistoryOrFavorite',
                        propertyID);
                    if (localKey == 'visitedPropertyId') {
                        this.items.list_properties_history = data.data;
                    } else {
                        this.items.list_properties_favorite = data.data
                    }
                },
                getLikeProperty: function() {
                    let localLikeProperty = localStorage.getItem('favoritePropertyId');
                    let likePropertyID = JSON.parse(localLikeProperty) || [];
                    this.items.like_property = likePropertyID;
                },
                switchTab: function(state) {
                    const localKeyHistory = 'visitedPropertyId';
                    const localKeyFavorite = 'favoritePropertyId';
                    if (state == 'history') {
                        this.items.isActiveFavorite = false;
                        this.items.isActiveHistory = true;
                        this.getListHistoryOrFavoriteProperty(localKeyHistory);
                    } else {
                        this.items.isActiveHistory = false;
                        this.items.isActiveFavorite = true;
                        this.getListHistoryOrFavoriteProperty(localKeyFavorite);
                    }
                },
                setLikeProperty: function(id) {
                    let propertyID = id;
                    this.items.selectedIdFavorite = id;
                    var properties_like = [];
                    let local = localStorage.getItem('favoritePropertyId');
                    properties_like = JSON.parse(local) || [];

                    if(this.items.isActiveFavorite == true){
                        this.items.confirmDelete = true;
                    } else {
                        if (properties_like.length > 0 && properties_like.includes(propertyID)) {
                            let index = properties_like.indexOf(propertyID);
                            console.log("index", index);
                            properties_like.splice(index, 1);
                            localStorage.setItem('favoritePropertyId', JSON.stringify(properties_like));
                        } else {
                            properties_like.push(propertyID);
                            localStorage.setItem('favoritePropertyId', JSON.stringify(properties_like));
                        }
                    }

                    this.getListHistoryOrFavoriteProperty('favoritePropertyId');
                    this.getLikeProperty();
                },
                deleteFavorite: function(confirm) {
                    let propertyID = this.items.selectedIdFavorite;
                    var properties_like = [];
                    let local = localStorage.getItem('favoritePropertyId');
                    properties_like = JSON.parse(local) || [];
                    if (confirm == true) {
                        if (properties_like.length > 0 && properties_like.includes(propertyID)) {
                            let index = properties_like.indexOf(propertyID);
                            console.log("index", index);
                            properties_like.splice(index, 1);
                            localStorage.setItem('favoritePropertyId', JSON.stringify(properties_like));
                        }
                    }
                    this.items.confirmDelete = false;
                    this.items.selectedIdFavorite = '';
                    this.getListHistoryOrFavoriteProperty('favoritePropertyId');
                    this.getLikeProperty();
                },
                clearHistory: function(){
                    if(confirm('物件閲覧履歴を消去してよろしいですか？')){
                        localStorage.removeItem('visitedPropertyId');
                        this.items.list_properties_history = '';
                    }
                }
                // --------------------------------------------------------------
            }
        }
    </script>
@endpush
