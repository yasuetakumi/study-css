@extends('backend._base.content_form')
@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.top_page')</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection
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
                @click="switchTab('history')">@lang('label.browsing_history')</button>
            <button type="button" :class="items.isActiveFavorite ? 'btn-primary' : 'btn-default' " class="btn px-4 py-2"
                @click="switchTab('favorite')">@lang('label.favorite_property')</button>
        </div>
    </div>
    <div class="text-right" v-if="items.isActiveHistory">
        <button type="button" class="btn btn-danger" @click="clearHistory" :disabled="!list_history">
            履歴の消去
        </button>
    </div>
    <hr>
    <div class="row">
        <div class="w-100" v-if="loading">
            <div class="text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
        <div class="w-100" v-else-if="!list_history && items.isActiveHistory">
            <p class="text-center">物件が見つかりません</p>
        </div>
        <div class="w-100" v-else-if="!list_favorite && items.isActiveFavorite">
            <p class="text-center">物件が見つかりません</p>
        </div>
        <div v-else-if="list_favorite && items.isActiveFavorite" class="col-md-4 d-flex align-items-stretch" v-for="pd in list_favorite" :key="pd.id">
            <property-list :property="pd" :distance="isWalkingDistanceSet(pd.id)">
                <button-favorite :likes="items.like_property" :idproperty="pd.id" @click="setLikeProperty(pd.id)"></button-favorite>
            </property-list>
        </div>
        <div v-else class="col-md-4 d-flex align-items-stretch" v-for="pd in list_history" :key="pd.id">
            <property-list :property="pd" :distance="isWalkingDistanceSet(pd.id)">
                <button-favorite :likes="items.like_property" :idproperty="pd.id" @click="setLikeProperty(pd.id)"></button-favorite>
            </property-list>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        var root_url = "{{ url('/') }}";
    </script>
@endpush
@push('vue-scripts')
@include('frontend._components.property_list')
@include('frontend._components.button_favorite')
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
                        localStorageFavorite: [],
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
            mounted: function() {
                const url = new URL(window.location.href);
                const queries = new URLSearchParams(url.search);
                const favorite = queries.get("favorite");
                let state = 'history'
                if(favorite != null){
                    state = 'favorite';
                }
                this.switchTab(state);
            },

            created: function() {
                this.getLikeProperty();
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
                },
                loading: function(){
                    return this.items.loading;
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
                    this.items.loading = true;
                    let local = localStorage.getItem(localKey);
                    let propertyID = JSON.parse(local) || [];
                    console.log(propertyID);
                    let filterId = [];
                    if(localKey == 'favoritePropertyId'){
                        this.items.localStorageFavorite = propertyID;
                        if(propertyID.length > 0){
                            for(let i= 0; i < propertyID.length; i++){
                                filterId.push(propertyID[i].id);
                            }
                            let data = await axios.post(root_url + '/api/v1/history/getPropertyHistoryOrFavorite', filterId);
                            this.items.list_properties_favorite = data.data
                        } else {
                            this.items.list_properties_favorite = []
                        }
                    }
                    else {
                        let data = await axios.post(root_url + '/api/v1/history/getPropertyHistoryOrFavorite', propertyID);
                        this.items.list_properties_history = data.data;
                    }
                    this.items.loading = false;
                },
                getLikeProperty: function() {
                    let local = JSON.parse(localStorage.getItem('favoritePropertyId')) || [];
                    this.items.localStorageFavorite = local;
                    let filterId = [];
                    if(local.length > 0){
                        for(let i= 0; i < local.length; i++){
                            // console.log(id);
                            filterId.push(local[i].id);
                        }
                        console.log(filterId);
                        if(filterId.length > 0){
                            this.items.like_property = filterId;
                        }
                    }
                    else {
                        this.items.like_property = [];
                    }
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
                    this.getLikeProperty();
                },
                setLikeProperty: function(id) {
                    let propertyID = id;
                    this.items.selectedIdFavorite = id;
                    var properties_like = [];
                    var filterArr = [];
                    let local = localStorage.getItem('favoritePropertyId');
                    properties_like = JSON.parse(local) || [];
                    filterArr = properties_like.filter(x => {return x.id == propertyID});
                    if(this.items.isActiveFavorite == true){
                        this.items.confirmDelete = true;
                    } else {
                        if (filterArr.length > 0) {
                            let index = properties_like.findIndex(object => {return object.id == propertyID});
                            console.log("index", index);
                            properties_like.splice(index, 1);
                            localStorage.setItem('favoritePropertyId', JSON.stringify(properties_like));
                            let msg = '気に入り物件から削除しました。'; //remove like
                            this.$toasted.show( msg, {
                                type: 'success'
                            });
                        } else {
                            var objectFavorite = {
                                'id': propertyID,
                                'distance': null
                            };
                            properties_like.push(objectFavorite);
                            localStorage.setItem('favoritePropertyId', JSON.stringify(properties_like));
                            let msg = 'お気に入り登録しました'; //add like
                            this.$toasted.show( msg, {
                                type: 'success'
                            });
                        }
                    }

                    this.getListHistoryOrFavoriteProperty('favoritePropertyId');
                    this.getLikeProperty();
                },
                deleteFavorite: function(confirm) {
                    let propertyID = this.items.selectedIdFavorite;
                    var properties_like = [];
                    var filterArr = [];
                    let local = localStorage.getItem('favoritePropertyId');
                    properties_like = JSON.parse(local) || [];
                    filterArr = properties_like.filter(x => {return x.id == propertyID});
                    if (confirm == true) {
                        if (filterArr.length > 0) {
                            let index = properties_like.findIndex(object => {return object.id == propertyID});
                            console.log("index", index);
                            properties_like.splice(index, 1);
                            localStorage.setItem('favoritePropertyId', JSON.stringify(properties_like));
                            let msg = '気に入り物件から削除しました。'; //remove like
                            this.$toasted.show( msg, {
                                type: 'success'
                            });
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
                },
                isWalkingDistanceSet: function(id){
                    if(this.items.localStorageFavorite.length > 0){
                        for(let i=0; i < this.items.localStorageFavorite.length; i++){
                        if(this.items.localStorageFavorite[i].id == id){
                            return this.items.localStorageFavorite[i].distance;
                        }
                    }
                    } else {
                        return null;
                    }
                }
                // --------------------------------------------------------------
            }
        }
    </script>
@endpush
