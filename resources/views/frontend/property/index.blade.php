@php
    if(auth()->guard('member')->check()){
        $memberId = auth()->guard('member')->user()->id;
    } else {
        $memberId = null;
    }
@endphp
@extends('backend._base.content_form')
@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.top_page')</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{route('prefecture.detail', ['name' => 'akita'])}}">@lang('label.prefecture') @lang('label.search')</a></li> --}}
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection
@section('content')
<div class="row">
    <div class="col-md-4 text-md">
        {{-- search history --}}
        @include('frontend.property.component.search-history')

        {{-- filter form --}}
        @include('frontend.property.component.filter')


        {{-- visited property --}}
        @include('frontend.property.component.visited-property')

        {{-- favorite property --}}
        @include('frontend.property.component.favorite-property')

    </div>

    <div class="col-md-8">
        {{-- property list result --}}
        @include('frontend.property.component.property-list-result')
    </div>
    {{-- Modal Dialog Email Search Preference--}}
    <email-search-preference @register="registerEmailSearchPreference" v-model="items.email_search_preference"></email-search-preference>

    {{-- Modal Saved Conditions --}}
    <save-conditions></save-conditions>
    {{-- Modal Region --}}
    <prefecture-modal @click="handleOpenStationCity" :prefectures="items.prefectures"></prefecture-modal>

    {{-- Modal Station City --}}
    <station-city-modal v-if="items.prefectureSelected" :filters="items.filter" :prefecture="items.prefectureSelected"></station-city-modal>

</div>
<div class="text-center">
    <a role="button" class="text-to-top fs-16" @click="scrollToTop">
        ページトップへ↑
    </a>
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
@include('frontend._components.property_related_list')
@include('frontend._components.email_search_preference')
@include('frontend._components.save_conditions')
@include('frontend._components.prefecture_modal')
@include('frontend._components.station_city_modal')
<script>
    // -------------------------------------------------------------------------
    // Vuex store - Centralized data
    // -------------------------------------------------------------------------
    store = {
        // ---------------------------------------------------------------------
        // Reactive central data
        // ---------------------------------------------------------------------
        state: function() {
            var state = {
                // -------------------------------------------------------------
                // Status flags
                // -------------------------------------------------------------
                status: {},
                // -------------------------------------------------------------

                // -------------------------------------------------------------
                // Preset data
                // -------------------------------------------------------------
                preset: {},
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

    // -------------------------------------------------------------------------
    mixin = {
        // ---------------------------------------------------------------------
        // VUE DATA
        // vue data binding, difine a properties
        // ---------------------------------------------------------------------
        data: function() {
            var data = {
                searchCondition: '',

                // -------------------------------------------------------------
                // Form result set here
                // -------------------------------------------------------------
                items: {
                    member_id: @json($memberId),
                    prefectures: @json($prefectures),
                    prefectureSelected: null,
                    user_id: null,
                    property_count: null,
                    property_data: [],
                    disable: true,
                    loading: false,
                    loadingCount: false,
                    like_property: [],
                    list_history_property: [],
                    list_properties_favorite: [],
                    filter: {
                        from_prefecture: null,
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
                        cities: [],
                        stations: [],
                    },
                    search_condition: false,
                    current_search_preference: null,
                    email_search_preference: null,
                    selectedIdFavorite: null,
                    walking_distance: null,
                },
                // -------------------------------------------------------------
            };
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
        mounted: function() {
            this.getListProperty();
            this.getLikeProperty();
            this.getCountProperty();
            this.getHistoryProperty();
            this.getFavoriteProperty();
            this.searchCondition = @json($searchCondition);
        },
        // ---------------------------------------------------------------------

        created: function() {
            this.getQueryString();
        },
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // VUE COMPUTED
        // define a property with custom logic
        // ---------------------------------------------------------------------
        computed: {
            // -----------------------------------------------------------------
            property_count: function(){
                return this.items.property_count;
            },
            // -----------------------------------------------------------------
            property_data: function(){
                if(this.items.property_data && this.items.property_data.length > 0){
                    return this.items.property_data;
                } else {
                    return false;
                }
            },
            // -----------------------------------------------------------------
            disabled: function(){
                return this.items.disable;
            },
            // -----------------------------------------------------------------
            loading: function() {
                return this.items.loading;
            },
            // -----------------------------------------------------------------
            loadingCount: function() {
                return this.items.loadingCount;
            },
            // -----------------------------------------------------------------
            filterCity: function(){
                return this.items.filter.cities;
            },
            // -----------------------------------------------------------------
            filterStation: function(){
                return this.items.filter.stations;
            },
            // -----------------------------------------------------------------
            historyProperty: function(){
                if(this.items.list_history_property && this.items.list_history_property.length > 0){
                    return this.items.list_history_property;
                } else {
                    return false;
                }
            },
            // -----------------------------------------------------------------
            list_favorite: function() {
                if (this.items.list_properties_favorite && this.items.list_properties_favorite.length > 0) {
                    return this.items.list_properties_favorite;
                } else {
                    return false;
                }
            },
            // -----------------------------------------------------------------
            displayedSearchCondition: function() {
                searchCondition = [];

                if (this.searchCondition) {
                    searchCondition = _.cloneDeep(this.searchCondition);
                    Vue.delete(searchCondition, 'number_of_match_property');
                    Vue.delete(searchCondition, 'url');
                    Vue.delete(searchCondition, 'created_at');

                    if(this.searchCondition.こだわり条件 === ''){
                        Vue.delete(searchCondition, 'こだわり条件');
                    }

                    if(this.searchCondition.階数_地上 === ''){
                        Vue.delete(searchCondition, '階数_地上');
                    }

                    if(this.searchCondition.階数_地下 === ''){
                        Vue.delete(searchCondition, '階数_地下');
                    }

                    if(this.searchCondition.飲食店の種類 === ''){
                        Vue.delete(searchCondition, '飲食店の種類');
                    }

                    if(this.containsKey(searchCondition, 'customer_email')){
                        Vue.delete(searchCondition, 'customer_email');
                    }

                    if(this.containsKey(searchCondition, 'member_id')){
                        Vue.delete(searchCondition, 'member_id');
                    }


                    // if(this.containsKey(searchCondition, '面積下限')){
                    //     Vue.set(searchCondition, '面積下限', searchCondition.surfaceMin);
                    //     Vue.delete(searchCondition, 'surfaceMin');
                    // }

                    // if(this.containsKey(searchCondition, '面積上限')){
                    //     Vue.set(searchCondition, '面積上限', searchCondition.surfaceMax);
                    //     Vue.delete(searchCondition, 'surfaceMax');
                    // }

                    // if(this.containsKey(searchCondition, '賃料下限')){
                    //     Vue.set(searchCondition, '賃料下限', searchCondition.rentAmountMin);
                    //     Vue.delete(searchCondition, 'rentAmountMin');
                    // }

                    // if(this.containsKey(searchCondition, '賃料上限')){
                    //     Vue.set(searchCondition, '賃料上限', searchCondition.rentAmountMax);
                    //     Vue.delete(searchCondition, 'rentAmountMax');
                    // }

                    // if(this.containsKey(searchCondition, '譲渡額下限')){
                    //     Vue.set(searchCondition, '譲渡額下限', searchCondition.transferPriceMin);
                    //     Vue.delete(searchCondition, 'transferPriceMin');
                    // }

                    // if(this.containsKey(searchCondition, '譲渡額上限')){
                    //     Vue.set(searchCondition, '譲渡額上限', searchCondition.transferPriceMax);
                    //     Vue.delete(searchCondition, 'transferPriceMax');
                    // }
                }

                return searchCondition;
            },
            displayCitiesSelected(){
                if(this.searchCondition){
                    if(this.searchCondition.市区町村){
                        return this.searchCondition.市区町村;
                    }
                    else {
                        return false;
                    }
                } else {
                    return false;
                }

            },
            displayStationsSelected(){
                if(this.searchCondition){
                    if(this.searchCondition.駅){
                        return this.searchCondition.駅;
                    }
                    else {
                        return false;
                    }
                } else {
                    return false;
                }
            },
            prefectureSelected(){
                return this.items.prefectureSelected;
            }
            // -----------------------------------------------------------------
        },
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // VUE WATCH
        // vue reactive data watch
        // ---------------------------------------------------------------------
        watch: {},
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // VUE METHOD
        // function associated with the vue instance
        // ---------------------------------------------------------------------
        methods: {
            containsKey(obj, key ) {
                return Object.keys(obj).includes(key);
            },
            // -----------------------------------------------------------------
            refreshParsley: function() {
                setTimeout(() => {
                    if ($('.parsley-errors-list.filled').length > 0) {
                        var $form = $('#property-form');
                        $form.parsley().validate();
                        checkSelect2Class();
                    }
                }, 400);
            },
            // -----------------------------------------------------------------
            getQueryString: function(){
                const url = new URL(window.location.href);
                const queries = new URLSearchParams(url.search);
                const fromPrefecture = queries.get('from_prefecture');
                const getUndergroundQs = queries.getAll('floor_under'); //filter for floor underground
                const getUAbovegroundQs = queries.getAll('floor_above'); //filter for floor aboveground
                const getPreferenceQs = queries.getAll('property_preference'); //filter for property preference
                const getTypesQs = queries.getAll('property_type'); //filter for property types
                const getCuisineQs = queries.getAll('cuisine');
                const getSurfaceMinQs = queries.get('surface_min');
                const getSurfaceMaxQs = queries.get('surface_max');
                const getRentAmountMinQs = queries.get('rent_amount_min');
                const getRentAmountMaxQs = queries.get('rent_amount_max');
                const getTransferPriceMinQs = queries.get('transfer_price_min');
                const getTransferPriceMaxQs = queries.get('transfer_price_max');
                const getNameQs = queries.get('name');
                const getWalkingDistanceQs = queries.get('walking_distance');
                const getFurnishedQs = queries.get('furnished');
                const getSkeletonQs = queries.get('skeleton');
                const getCityQs = queries.getAll('city');
                const getStationQs = queries.getAll('station');

                if(fromPrefecture != null){
                    this.items.filter.from_prefecture = fromPrefecture;
                }
                if(getSurfaceMinQs != null){
                    this.items.filter.surface_min = getSurfaceMinQs;
                }
                if(getSurfaceMaxQs != null){
                    this.items.filter.surface_max = getSurfaceMaxQs;
                }
                if(getRentAmountMinQs != null){
                    this.items.filter.rent_amount_min = getRentAmountMinQs;
                }
                if(getRentAmountMaxQs != null){
                    this.items.filter.rent_amount_max = getRentAmountMaxQs;
                }
                if(getTransferPriceMinQs != null){
                    this.items.filter.transfer_price_min = getTransferPriceMinQs;
                }
                if(getTransferPriceMaxQs != null){
                    this.items.filter.transfer_price_max = getTransferPriceMaxQs;
                }
                if(getNameQs != null){
                    this.items.filter.name = getNameQs;
                }
                if(getWalkingDistanceQs != null){
                    this.items.filter.walking_distance = getWalkingDistanceQs;
                    this.items.walking_distance = getWalkingDistanceQs;
                }
                if(getFurnishedQs != null){
                    this.items.filter.furnished = getFurnishedQs;
                }
                if(getSkeletonQs != null){
                    this.items.filter.skeleton = getSkeletonQs;
                }
                // extract value query string of underground
                if(getUndergroundQs.length > 0){
                    let undergroundSplit = getUndergroundQs[0].split(",") || [];
                        for(under of undergroundSplit){
                            this.items.filter.undergrounds.push(under);
                        }
                }
                // extract value query string of aboveground
                if(getUAbovegroundQs.length > 0){
                    let abovegroundSplit = getUAbovegroundQs[0].split(",") || [];
                        for(above of abovegroundSplit){
                            this.items.filter.abovegrounds.push(above);
                        }
                }
                // extract value query string of property preference
                if(getPreferenceQs.length > 0){
                    let preferencedSplit = getPreferenceQs[0].split(",") || [];
                        for(pref of preferencedSplit){
                            this.items.filter.preferences.push(pref);
                        }
                }
                // extract value query string of property types
                if(getTypesQs.length > 0){
                    let typesSplit = getTypesQs[0].split(",") || [];
                        for(type of typesSplit){
                            this.items.filter.types.push(type);
                        }
                }
                // extract value query string of cuisine
                if(getCuisineQs.length > 0){
                    let cuisineSplit = getCuisineQs[0].split(",") || [];
                        for(cuisine of cuisineSplit){
                            this.items.filter.cuisines.push(cuisine);
                        }
                }
                // extract value query string of city
                if(getCityQs.length > 0){
                    let citySplit = getCityQs[0].split(",") || [];
                        for(city of citySplit){
                            this.items.filter.cities.push(city);
                        }
                }
                // extract value query string of station
                if(getStationQs.length > 0){
                    let stationSplit = getStationQs[0].split(",") || [];
                        for(station of stationSplit){
                            this.items.filter.stations.push(station);
                        }
                }
            },
            // -----------------------------------------------------------------
            getListProperty: function(event) {
                this.items.loading = true;
                let url = window.location.href;
                let data = new FormData(filterForm);
                axios.post(root_url + '/api/v1/property/getProperties', data)
                    .then((result) => {
                        this.items.property_data = result.data.data.result;
                        this.items.loading = false;
                    }).catch((err) => {
                        console.log(err);
                        this.items.loading = false;
                });
            },
            // -----------------------------------------------------------------
            getCountProperty: function(event) {
                this.items.loadingCount = true;
                if(this.$refs.skeleton.checked == true && this.$refs.furnished.checked == true){
                    this.items.filter.cuisines = [];
                    this.items.filter.transfer_price_min = null;
                    this.items.filter.transfer_price_max = null;
                    this.items.disable = false;
                } else {
                    this.items.disable = true;
                }
                let data = new FormData(filterForm);
                data.append("count", 1);
                axios.post(root_url + '/api/v1/property/getPropertiesCount', data)
                    .then((result) => {
                        this.items.property_count = result.data.data.count;
                        this.items.loadingCount = false;
                    }).catch((err) => {
                        this.items.loadingCount = false;
                        console.log(err);
                });
            },
            // -----------------------------------------------------------------
            getLikeProperty: async function() {
                let propertyFavorites = [];
                let filterId = [];
                // if login, get from db
                if(this.items.member_id){
                    propertyFavorites = await this.getMemberFavoriteProperty();
                    if(propertyFavorites.length > 0){
                        for(let i= 0; i < propertyFavorites.length; i++){
                            filterId.push(propertyFavorites[i].property_id);
                        }
                        if(filterId.length > 0){
                            this.items.like_property = filterId;
                        }
                    }
                    else {
                        this.items.like_property = [];
                    }
                // else get from storage
                } else {
                    this.updateLocalLikeProperty();
                    propertyFavorites = JSON.parse(localStorage.getItem('favoritePropertyId')) || [];
                    // let filterId = [];
                    if(propertyFavorites.length > 0){
                        for(let i= 0; i < propertyFavorites.length; i++){
                            filterId.push(propertyFavorites[i].id);
                        }
                        if(filterId.length > 0){
                            this.items.like_property = filterId;
                        } else {
                            this.items.like_property = [];
                        }

                    } else {
                        this.items.like_property = [];
                    }
                }
            },
            // -----------------------------------------------------------------
            setLikeProperty: function (id) {
                // if login store to db
                if(this.items.member_id){
                    this.setMemberFavoriteProperty(id);
                } else {
                    // if not login store to local storage
                    let propertyID = id;
                    this.items.selectedIdFavorite = id;
                    var properties_like = [];
                    var filterArr = [];
                    let local = localStorage.getItem('favoritePropertyId');
                    properties_like = JSON.parse(local) || [];
                    filterArr = properties_like.filter(x => {return x.id == propertyID});
                    if(filterArr.length > 0){
                        let index = properties_like.findIndex(object => {return object.id == propertyID});
                        properties_like.splice(index, 1);
                        localStorage.setItem('favoritePropertyId', JSON.stringify(properties_like));
                        let msg = 'お気に入り物件から削除しました'; //remove like
                        this.$toasted.show( msg, {
                            type: 'success'
                        });
                    } else {
                        const dateTime = moment(new Date()).format("YYYY/MM/DD HH:mm:ss");

                        var objectFavorite = {
                            'id': propertyID,
                            'distance': this.items.walking_distance,
                            'date_added': dateTime
                        };
                        properties_like.push(objectFavorite);
                        localStorage.setItem('favoritePropertyId', JSON.stringify(properties_like));
                        let msg = 'お気に入り登録しました'; //add like
                        this.$toasted.show( msg, {
                            type: 'success'
                        });
                    }
                }
                this.getLikeProperty();
            },
            // -----------------------------------------------------------------
            updateLocalLikeProperty: function() {
                let local = JSON.parse(localStorage.getItem('favoritePropertyId')) || [];
                if (local.length > 0) {
                    // remove data if the date added is undefined
                    const updateLocal = [];
                    for (let i = 0; i < local.length; i++) {
                        if (typeof local[i].date_added !== 'undefined') {
                            updateLocal.push(local[i]);
                        }
                    }
                    local = localStorage.getItem('favoritePropertyId');
                    localStorage.setItem('favoritePropertyId', JSON.stringify(updateLocal));
                }
            },
            // -----------------------------------------------------------------
            getHistoryProperty: async function() {
                let storageFavorites = [];
                let propertyIDs = [];
                // if login get from db
                if(this.items.member_id){
                    this.getMemberViewedProperty();
                    storageFavorites = await this.getMemberFavoriteProperty();
                    for (const key in storageFavorites) {
                        propertyIDs.push(storageFavorites[key].property_id)
                    }
                // else get from local storage
                } else {
                    let local = localStorage.getItem("visitedPropertyId");
                    storageFavorites = JSON.parse(local) || [];
                    for (const key in storageFavorites) {
                        propertyIDs.push(storageFavorites[key].id)
                    }
                }

                axios.post(root_url + '/api/v1/history/getPropertyHistoryOrFavorite', propertyIDs)
                    .then((result) => {
                            //get only last 3 data
                            for(let i= 0; i < 3; i++){
                                if(result.data[i] != null){
                                    this.items.list_history_property.push(result.data[i]);
                                }
                            }
                            // this.items.list_history_property = result.data;
                        }).catch((err) => {
                            console.log(err);
                    });
            },
            // -----------------------------------------------------------------
            getFavoriteProperty: function() {
                axios.post(root_url + '/api/v1/history/getPropertyHistoryOrFavorite', this.items.like_property)
                    .then((result) => {
                            //get only recently 3 data
                            for(let i= 0; i < 3; i++){
                                if(result.data[i] != null){
                                    this.items.list_properties_favorite.push(result.data[i]);
                                }
                            }
                        }).catch((err) => {
                            console.log(err);
                    });
            },
            // -----------------------------------------------------------------
            registerSearchCondition: function(searchCondition, byPassCondition = false) {
                if (Object.keys(this.searchCondition).length || byPassCondition) {
                    // // if login store to db
                    // if(this.items.member_id){
                    //     axios.post(root_url + '/search-preference', searchCondition)
                    //     .then((result) => {
                    //         // Show success alert
                    //         let msg = '@lang('label.SUCCESS_CREATE_MESSAGE')';
                    //         this.$toasted.show( msg, {
                    //             type: 'success'
                    //         });
                    //     }).catch((err) => {
                    //         console.log(err);
                    //     })
                    // // else, store to localstorage
                    // } else {

                    // }

                    // Get local storage
                    let registeredSearchCondition = localStorage.getItem('searchCondition');
                    registeredSearchCondition = _.takeRight(JSON.parse(registeredSearchCondition), 9);
                    registeredSearchCondition.push(searchCondition);

                    // Add search condition to local storage
                    localStorage.setItem('searchCondition', JSON.stringify(registeredSearchCondition));

                    // Show success alert
                    let msg = '@lang('label.SUCCESS_CREATE_MESSAGE')';
                    this.$toasted.show( msg, {
                        type: 'success'
                    });
                }
            },
            // -----------------------------------------------------------------
            registerNewEmail: function(searchCondition) {
                this.registerSearchCondition(searchCondition);
                this.items.current_search_preference = searchCondition;
                // Todo
                // Register new email
            },
            // -----------------------------------------------------------------
            registerCurrentFilter: function() {
                // Define filter data
                let filter = new FormData(filterForm);
                filter.append('toJson', true);

                // Do server request to get compiled filter data
                let vm = this;
                axios.post(root_url + '/compile-filter', filter)
                    .then((result) => {
                        vm.registerSearchCondition(result.data, true);
                    }).catch((err) => {
                         console.log(err);
                    });
            },
            registerEmailSearchPreference: function(){
                let emailAndMemberId = {"customer_email" : this.items.email_search_preference, "member_id" : this.items.member_id, "created_at": moment(new Date()).format("YYYY-MM-DD HH:mm:ss")};
                let data = this.items.current_search_preference;

                Object.assign(data, emailAndMemberId);
                axios.post(root_url + '/search-preference', data)
                    .then((result) => {
                        console.log(result.data);
                        this.items.email_search_preference = null;
                        // Show success alert
                        let msg = '@lang('label.SUCCESS_CREATE_MESSAGE')';
                        this.$toasted.show( msg, {
                            type: 'success'
                        });
                    }).catch((err) => {
                        console.log(err);
                    })
            },
            getCurrentIndexSearch: function(value){
                this.items.current_search_preference = value;
                console.log(this.items.current_search_preference);
            },
            resetFilterQueryParams: function(){
                this.searchCondition = [];
                window.location.href = '/result';
            },
            handleOpenStationCity(id){
                this.items.prefectureSelected = id;
            },
            scrollToTop: function(){
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            },
            setMemberFavoriteProperty: function(id){
                let data = {
                    'property_id': id,
                    'member_id': this.items.member_id
                };
                axios.post(root_url + '/api/v1/property/storeFavorite', data)
                .then(response => {
                    if(response.data.status == "success"){
                        let msg = 'お気に入り登録しました'; //add like
                        this.$toasted.show( msg, {
                            type: 'success'
                        });
                    } else if(response.data.status == "deleted"){
                        let msg = 'お気に入り物件から削除しました'; //remove like
                        this.$toasted.show( msg, {
                            type: 'success'
                        });
                    }
                    this.getLikeProperty();
                })
                .catch(error => {
                    console.log(error);
                });
            },
            getMemberFavoriteProperty: async function(){
                let response = await axios.get(root_url + '/api/v1/property/getFavorite/' + this.items.member_id);
                if(response.status == 200){
                    return response.data;
                } else {
                    return [];
                }
            },
            getMemberViewedProperty: async function(){
                let response = await axios.get(root_url + '/api/v1/property/getViewed/' + this.items.member_id);
                if(response.status == 200){
                    return response.data;
                } else {
                    return [];
                }
            },
            // -----------------------------------------------------------------
        }
        // ---------------------------------------------------------------------
    }
    // -------------------------------------------------------------------------
</script>
@endpush
