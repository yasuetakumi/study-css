@php
    $disableForm = false;
    $disableSelect2 = false;
    $companyUserId = '';
    $agencyId = '';
    $isCompanyLogin = false;
    $isAdminLogin = false;
    if ($page_type == 'detail') {
        $disableForm = true;
    }
    if(!Auth::check()){
        $disableSelect2 = true;
    } else {
        $disableSelect2 = false;
        $isAdminLogin = true;
    }
    if(Auth::guard('user')->check()){
        $disableSelect2 = true;
        $companyUserId = Auth::id();
        $agencyId = Auth::guard('user')->user()->belong_company_id;
        $isCompanyLogin = true;
    }
    $year100ago = date('Y') - 100;
    $year100later = date('Y') + 100;
    $optionsYears = array();
    for($i = $year100ago; $i <= $year100later; $i++){
        $optionsYears[$i] = $i;
    }
    $propertyIsPublish = \App\Models\PropertyPublicationStatus::ID_PUBLISHED;
    $propertyIsLimited = \App\Models\PropertyPublicationStatus::ID_LIMITED_PUBLISHED;

@endphp
@extends('backend._base.content_form')
@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        @if($isAdminLogin)
            <li class="breadcrumb-item"><a href="{{route('admin.property.index')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        @else
            <li class="breadcrumb-item"><a href="{{route('company.property.index')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        @endif
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('top_buttons')
    @if (!Auth::check())
        <div class="text-right">
            <a id="favorite" type="button" style="color: red" @click="setLikeProperty">
                <i v-if="isLiked" class="fas fa-heart fa-2x"></i>
                <i v-else class="far fa-heart fa-2x"></i>
            </a>
        </div>
    @endif
@endsection

@section('content')
    @component('backend._components.form_container', ["action" => $form_action, 'id' => 'property-form',  "page_type" => $page_type, "files" => true])
        {{-- publish button for admin --}}
        @if($page_type == 'edit')
            @if($item->publication_status_id == $propertyIsPublish || $item->publication_status_id == $propertyIsLimited)
                <div class="text-right">
                    <a class="text-link fs-16" target="_blank" href="{{route('property.detail', $item->id)}}">@lang('label.see_property_detail')</a>
                </div>
            @endif
        @endif
        @component('backend._components.input_radio', ['is_indexed_value' => true, 'options' => $publication_statuses, 'name' => 'publication_status_id', 'label' => __('label.publication_status'), 'value' => $item->publication_status_id ?? '', 'required' => false])
        @endcomponent

        {{-- publish button for company user --}}
        {{-- @if($page_type == 'edit' && auth()->guard('user')->check())
            @component('backend._components.input_button_anchor', [
                'label' => isset($item) && $item->publication_status_id == 1 ? '保存して掲載する' : '保存して非掲載にする',
                'value' => isset($item) && $item->publication_status_id == 1 ? '掲載にする' : '非掲載にする',
                'required' => 0,
                'route' => isset($item) ? route('company.publication.status', $item->id) : null
            ])@endcomponent
        @endif --}}

        @component('backend._components.vue.form.vue-select', [
            'name'          => 'company_id',
            'label'         => __('label.real_estate_agency'),
            'label_select'  => 'text',
            'required'      => 'true',
            'options'       => 'companies_options',
            'model'         => 'items.company_id',
            'method'        => 'handleSelectCompany',
            'disabled'      => 'items.disabled',
        ])@endcomponent
        @component('backend._components.vue.form.vue-select', [
            'name'          => 'user_id',
            'label'         => __('label.real_estate_agent_in_charge'),
            'label_select'  => 'text',
            'required'      => 'true',
            'options'       => 'users_options',
            'model'         => 'items.user_id',
            'disabled'      => 'items.disabled',
        ])@endcomponent

        @component('backend._components.input_select_ajax',[
            'name'              => 'postcode_id',
            'options'           => [empty($item->postcode->postcode) ? '' : $item->postcode->postcode],
            'label'             => __('label.postcode'),
            'required'          => 1,
            'url'               => route('select2.postcode'),
            'value'             => $item->postcode_id ?? ''])
        @endcomponent

        @component('backend._components.vue.form.vue-select', [
            'name'          => 'prefecture_id',
            'label'         => __('label.prefecture'),
            'label_select'  => 'text',
            'required'      => 'true',
            'options'       => 'prefectures',
            'model'         => 'items.prefecture_city_id',
            'method'        => 'handleSelectPrefectureCity',
            'disabled'      => 'false',
        ])@endcomponent

        @component('backend._components.vue.form.vue-select', [
            'name'          => 'city_id',
            'label'         => __('label.cities'),
            'label_select'  => 'text',
            'required'      => 'true',
            'options'       => 'items.list_city',
            'model'         => 'items.city_id',
            'disabled'      => 'false',
        ])@endcomponent

        @component('backend._components.input_text', ['name' => 'location', 'label' => __('label.location'), 'required' => 1, 'value' => $item->location ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend.property.components.station')@endcomponent
        <div v-if="getSelectedStations.length > 0">
            @component('backend._components.vue.form.vue-select', [
                'name'          => 'nearest_station_id',
                'label'         => __('label.nearest_station'),
                'label_select'  => 'display_name',
                'required'      => 'false',
                'options'       => 'getSelectedStations',
                'model'         => 'items.select_nearest_station',
                'disabled'      => 'false',
            ])@endcomponent
        </div>
        <div v-if="items.select_nearest_station">
            @component('backend._components.input_select', ['name' => 'walking_distance_id', 'options' => $walking_distances, 'label' => __('label.walk_from_nearest_station'), 'required' => false, 'value' => $item->property_stations_closest->distance_from_station ?? '', 'isDisabled' => $disableForm]) @endcomponent
        </div>
        @component('backend._components.input_decimal', ['name' => 'surface_area', 'label' => __('label.surface_area_tsubo'), 'required' => 1, 'value' => $page_type == 'create' ? '' : toTsubo($item->surface_area, false, 2), 'isReadOnly' => $disableForm, 'method' => 'changePlanBySurfaceArea' ]) @endcomponent
        {{-- Plan --}}
        @if ($page_type == 'create' || $page_type == 'edit')
            @include('backend.property.components.plans_design_category')
        @endif

        @component('backend._components.input_decimal', ['name' => 'rent_amount', 'label' => __('label.rent_amount_man'), 'required' => 1, 'value' => $page_type == 'create' ? '' : toMan($item->rent_amount, false, 2), 'isReadOnly' => $disableForm]) @endcomponent

        @component('backend._components.input_number', ['name' => 'number_of_floors_under_ground', 'label' => __('label.number_of_floor_underground'), 'required' => null, 'value' => $item->number_of_floors_under_ground ?? '', 'isReadOnly' => $disableForm]) @endcomponent
        @component('backend._components.input_number', ['name' => 'number_of_floors_above_ground', 'label' => __('label.number_of_floor_aboveground'), 'required' => null, 'value' => $item->number_of_floors_above_ground ?? '', 'isReadOnly' => $disableForm]) @endcomponent
        @component('backend._components.input_select', ['name' => 'property_type_id', 'options' => $property_types, 'label' => __('label.restaurant_type'), 'required' => null, 'value' => $item->property_type_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_select', ['name' => 'structure_id', 'options' => $structures, 'label' => __('label.structure'), 'required' => null, 'value' => $item->structure_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_number', ['name' => 'deposit_amount', 'label' => __('label.deposit') . '(万)', 'required' => null, 'value' => $page_type == 'create' ? '' : toMan($item->deposit_amount), 'isReadOnly' => $disableForm]) @endcomponent
        @component('backend._components.input_number', ['name' => 'monthly_maintainance_fee', 'label' => __('label.monthly_maintaner') . '(万)', 'required' => null, 'value' => $page_type == 'create' ? '' : toMan($item->monthly_maintainance_fee), 'isReadOnly' => $disableForm]) @endcomponent
        @component('backend._components.input_text', ['name' => 'repayment', 'label' => __('label.repayment_conditions'), 'required' => null, 'value' => $item->repayment ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        {{-- @component('backend._components.input_date_picker', ['name' => 'date_built', 'label' => __('label.year_built'), 'required' => null, 'value' => $item->date_built ?? '', 'isReadOnly' => $disableForm ]) @endcomponent --}}
        @component('backend._components.input_select', ['name' => 'date_built', 'label' => __('label.year_built'), 'required' => null, 'options' => $optionsYears, 'value' => $item->date_built_year ?? '', 'isReadOnly' => $disableForm]) @endcomponent
        {{-- save and display as man --}}
        @component('backend._components.input_text', ['name' => 'renewal_fee', 'label' => __('label.renewal_fee') . '(円)', 'required' => null, 'value' => $item->renewal_fee ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_number', ['name' => 'contract_length_in_months', 'label' => __('label.contract_length') . ' (ヶ月)', 'required' => null, 'value' => $item->contract_length_in_months ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_number', ['name' => 'special_moving_fee', 'label' => __('label.moving_fee') . '(万)', 'required' => null, 'value' => $page_type == 'create' ? '' : toMan($item->special_moving_fee), 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_select', ['name' => 'business_terms_id', 'options' => $business_terms, 'label' => __('label.business_terms'), 'required' => null, 'value' => $item->business_terms_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_text_editor', ['name' => 'comment', 'label' => __('label.comments'), 'required' => null, 'value' => $item->comment ?? '', 'isReadOnly' => $disableForm ]) @endcomponent

        @component('backend._components.input_select', ['name' => 'is_skeleton', 'options' => $is_skeleton, 'label' => __('label.is_skeleton'), 'required' => true, 'value' => $item->is_skeleton ?? '', 'isDisabled' => $disableForm]) @endcomponent

        @component('backend._components.input_select', ['name' => 'cuisine_id', 'options' => $cuisines, 'label' => __('label.restaurant_cuisine'), 'required' => null, 'value' => $item->cuisine_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_number', ['name' => 'interior_transfer_price', 'label' => __('label.interior_transfer_price') . '(万)', 'required' => null, 'value' => $page_type == 'create' ? '' : toMan($item->interior_transfer_price), 'isReadOnly' => $disableForm ]) @endcomponent

        @component('backend._components.input_image', ['name' => 'thumbnail_image_main', 'label' => __('label.thumbnail_image_main'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->thumbnail_image_main ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'thumbnail_image_1', 'label' => __('label.thumbnail_image') . ' 1', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->thumbnail_image_1 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'thumbnail_image_2', 'label' => __('label.thumbnail_image') . ' 2', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->thumbnail_image_2 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'thumbnail_image_3', 'label' => __('label.thumbnail_image') . ' 3', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->thumbnail_image_3 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'thumbnail_image_4', 'label' => __('label.thumbnail_image') . ' 4', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->thumbnail_image_4 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'thumbnail_image_5', 'label' => __('label.thumbnail_image') . ' 5', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->thumbnail_image_5 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'thumbnail_image_6', 'label' => __('label.thumbnail_image') . ' 6', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->thumbnail_image_6 ?? '']) @endcomponent

        @component('backend._components.input_image', ['name' => 'image_1', 'label' => __('label.image') . ' 1', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_1 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_2', 'label' => __('label.image') . ' 2', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_2 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_3', 'label' => __('label.image') . ' 3', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_3 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_4', 'label' => __('label.image') . ' 4', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_4 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_5', 'label' => __('label.image') . ' 5', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_5 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_6', 'label' => __('label.image') . ' 6', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_6 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_7', 'label' => __('label.image') . ' 7', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_7 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_8', 'label' => __('label.image') . ' 8', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_8 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_9', 'label' => __('label.image') . ' 9', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_9 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_10', 'label' => __('label.image') . ' 10', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_10 ?? '']) @endcomponent

        @component('backend._components.input_image360', ['name' => 'image_360_1', 'label' => __('label.image_360') . ' 1', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_360_1 ?? '']) @endcomponent
        @component('backend._components.input_image360', ['name' => 'image_360_2', 'label' => __('label.image_360') . ' 2', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_360_2 ?? '']) @endcomponent
        @component('backend._components.input_image360', ['name' => 'image_360_3', 'label' => __('label.image_360') . ' 3', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_360_3 ?? '']) @endcomponent
        @component('backend._components.input_image360', ['name' => 'image_360_4', 'label' => __('label.image_360') . ' 4', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_360_4 ?? '']) @endcomponent
        @component('backend._components.input_image360', ['name' => 'image_360_5', 'label' => __('label.image_360') . ' 5', 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_360_5 ?? '']) @endcomponent
        {{-- input button --}}
        @if($page_type == 'create')
            @component('backend._components.input_buttons', ['page_type' => $page_type])@endcomponent
        @else
            @component('backend._components.input_float_button', ['page_type' => $page_type])@endcomponent
        @endif
    @endcomponent

@endsection

@push('scripts')
    <script type="text/javascript"> var root_url = "{{ url('/') }}";</script>
    <script type="text/javascript"> var pannelum_asset = "{{ asset('js/pannellum/pannellum.htm') }}";</script>
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
                    companies_options: @json($companies_options),
                    property: @json($item),
                    property_related: @json($property_related),
                    prefectures: @json($prefectures),
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
                    user_id: null,
                    list_user: null,
                    company_id: null,
                    area_id: null,
                    selected_dc: 1,
                    list_design_style: null,
                    list_plans: null,
                    list_plans_properties: null,
                    list_estimation: null,
                    design_category_id: null,
                    plan_id: null,
                    message_plan_properties: '*Please Input Surface Area (Tsubo) and Select Design Category*',
                    loading: false,
                    like_property: [],
                    property_id: null,
                    visited_property: [],
                    disabled: @json($disableSelect2),
                    selected_plan_dc_1: null,
                    selected_plan_dc_2: null,
                    selected_plan_dc_3: null,
                    selected_plan_dc_4: null,
                    plans_design_category_1: null,
                    plans_design_category_2: null,
                    plans_design_category_3: null,
                    plans_design_category_4: null,
                    design_category_1: 1,
                    design_category_2: 2,
                    design_category_3: 3,
                    design_category_4: 4,
                    surface_area: null,

                    //stations
                    prefecture_id: null,
                    station_line_id: null,
                    list_station_lines: [],
                    list_stations: [],
                    selected_stations: [],
                    select_nearest_station: null,

                    prefecture_city_id: null,
                    list_city: [],
                    city_id: null,
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

            if(@json($page_type) == 'edit'){
                var item = @json($item);
                this.items.company_id = item.user.company.id;
                this.items.user_id = item.user_id;
                this.items.property_id = item.id;
                this.items.prefecture_city_id = item.prefecture_id;
                this.items.city_id = item.city_id;
                this.setVisitedProperty();

                var property_stations = item.property_stations ?? [];
                if(property_stations.length > 0 ){
                    property_stations.forEach(function(item){
                        this.items.selected_stations.push(item.station_id);
                    }.bind(this));
                    if(item.property_stations_closest != null){
                        this.items.prefecture_id = item.property_stations_closest.station.prefecture_id;
                        this.items.station_line_id = item.property_stations_closest.station.station_line.id;
                        this.items.select_nearest_station = item.property_stations_closest.station.id;
                        this.getStationByStationLine(this.items.prefecture_id, this.items.station_line_id);
                        this.getStationLineByPrefecture(this.items.prefecture_id);
                    }
                }

            }
            if (@json($page_type) == 'create' && @json($companyUserId) != null) {
                var id = @json($companyUserId);
                var companyId = @json($agencyId);
                this.items.user_id = id;
                this.items.company_id = companyId;
            }

            this.handleSelectCompany();
            this.handleSelectPrefectureCity();
            if(@json($page_type) != 'detail'){
                this.changePlanBySurfaceArea();
            }


        },

        created: function(){
            this.getLikeProperty();
        },

        /*
        ## ------------------------------------------------------------------
        ## VUE COMPUTED
        ## define a property with custom logic
        ## ------------------------------------------------------------------
        */
        computed: {
            companies_options: function(){
                return this.$store.state.preset.companies_options;
            },
            prefectures: function(){
                return this.$store.state.preset.prefectures;
            },
            getSelectedStationLine: function(){
                if(this.items.station_line_id != null){
                    return this.items.list_station_lines.find(function(item){
                        return item.id == this.items.station_line_id;
                    }.bind(this));
                } else {
                    return nu;
                }
            },
            getSelectedStations: function(){
                if(this.items.selected_stations.length > 0){
                    const selectedStation = this.items.selected_stations;
                    // filter out the selected stations
                    const stations = this.items.list_stations.filter(station => {
                        return selectedStation.includes(station.id);
                    });
                    return stations;
                } else {
                    return [];
                }
            },
            users_options: function(){
                if(this.items.list_user != null){
                    return this.items.list_user
                }
                else {
                    return [];
                }

            },
            propertyList: function(){
                return this.$store.state.preset.property;
            },
            itemPropertyPlans: function(){
                return this.$store.state.preset.property.property_plans;
            },
            designStyles: function(){
                return this.items.list_design_style;
            },
            plans: function(){
                if(this.items.list_plans != null && this.items.list_plans.length > 0){
                    return this.items.list_plans;
                } else {
                    return false;
                }
            },
            plan_properties: function () {
                if(this.items.list_plans_properties != null && this.items.list_plans_properties.length > 0){
                    return this.items.list_plans_properties;
                } else {
                    return false;
                }
            },
            message_plan_properties: function () {
                if (this.items.message_plan_properties === null){
                    return false;
                } else {
                    return this.items.message_plan_properties;
                }
            },
            loadingData: function(){
                return this.items.loading;
            },
            isLiked: function () {
                if(this.items.like_property && this.items.like_property.length > 0 && this.items.like_property.includes(this.items.property_id)){
                    return true;
                } else {
                    return false;
                }
            },
            property_related: function(){
                return this.$store.state.preset.property_related;
            },
            pathToImage: function(){
                let pathUploads = @json(asset('uploads/plans'));
                return pathUploads + '/';
            },
            plans_design_category_1: function(){
                if(this.items.plans_design_category_1 && this.items.plans_design_category_1.length > 0){
                    return this.items.plans_design_category_1;
                } else {
                    return false;
                }
            },
            plans_design_category_2: function(){
                if(this.items.plans_design_category_2 && this.items.plans_design_category_2.length > 0){
                    return this.items.plans_design_category_2;
                } else {
                    return false;
                }
            },
            plans_design_category_3: function(){
                if(this.items.plans_design_category_3 && this.items.plans_design_category_3.length > 0){
                    return this.items.plans_design_category_3;
                } else {
                    return false;
                }
            },
            plans_design_category_4: function(){
                if(this.items.plans_design_category_4 && this.items.plans_design_category_4.length > 0){
                    return this.items.plans_design_category_4;
                } else {
                    return false;
                }
            }
        },
        updated: function(){
            // this.has_kitchen();
        },

        /*
        ## ------------------------------------------------------------------
        ## VUE WATCH
        ## vue reactive data watch
        ## ------------------------------------------------------------------
        */
        watch: {
            // watch for changes in the prefecture_id
            'items.prefecture_id': function(){
                // this.items.station_line_id = null;
                // this.items.list_station_lines = [];
                // this.items.list_stations = [];
                // this.items.selected_stations = [];
                // console.log('prefecture_id changed');
                // this.handleSelectPrefecture();
            },
            'items.station_line_id': function(){
                // this.items.list_stations = [];
                // this.items.selected_stations = [];
                // console.log('station_line_id changed');
                // this.handleSelectStationLine();
            }
        },

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
                    if($('.parsley-errors-list.filled').length > 0) {
                        var $form = $('#property-form');
                        $form.parsley().validate();
                        checkSelect2Class();
                    }
                }, 400);
            },

            changePlanBySurfaceArea: async function(){
                this.items.loading = true;

                await this.getPlanBySurfaceCategory(1);
                await this.getPlanBySurfaceCategory(2);
                await this.getPlanBySurfaceCategory(3);
                await this.getPlanBySurfaceCategory(4);
                setTimeout(() => {
                    this.items.loading = false;
                }, 1000);
            },
            getPlanBySurfaceCategory: function (catId) {
                let surface_area = document.querySelector("input[name=surface_area]").value;
                this.items.surface_area = surface_area;
                var isSurfaceEmpty = surface_area === '';
                if(isSurfaceEmpty == false && catId != null){
                    axios.get(root_url + '/api/v1/plans/getPlanBySurfaceAndCategory/' + surface_area + '/' + catId)
                    .then((result) => {
                        // console.log("RESULTTT", result.data.data);
                        this.items.message_plan_properties = '';
                        if(catId == this.items.design_category_1){
                            this.items.plans_design_category_1 = result.data.data;
                            if(@json($page_type) == 'edit'){
                                const filteredIdCat1 = this.itemPropertyPlans.filter(el => el.plan.design_category_id == this.items.design_category_1);
                                for(let i = 0; i < this.items.plans_design_category_1.length; i++){
                                    if(this.items.plans_design_category_1[i].id == filteredIdCat1[0].plan_id){
                                        this.items.selected_plan_dc_1 = this.items.plans_design_category_1[i].id;
                                    }
                                }
                            }

                        } else if(catId == this.items.design_category_2){
                            this.items.plans_design_category_2 = result.data.data;
                            if(@json($page_type) == 'edit'){
                                const filteredIdCat2 = this.itemPropertyPlans.filter(el => el.plan.design_category_id == this.items.design_category_2);
                                for(let i = 0; i < this.items.plans_design_category_2.length; i++){
                                    if(this.items.plans_design_category_2[i].id == filteredIdCat2[0].plan_id){
                                        this.items.selected_plan_dc_2 = this.items.plans_design_category_2[i].id;
                                    }
                                }
                            }

                        } else if(catId == this.items.design_category_3){
                            this.items.plans_design_category_3 = result.data.data;
                            if(@json($page_type) == 'edit'){
                                const filteredIdCat3 = this.itemPropertyPlans.filter(el => el.plan.design_category_id == this.items.design_category_3);
                                for(let i = 0; i < this.items.plans_design_category_3.length; i++){
                                    if(this.items.plans_design_category_3[i].id == filteredIdCat3[0].plan_id){
                                        this.items.selected_plan_dc_3 = this.items.plans_design_category_3[i].id;
                                    }
                                }
                            }

                        } else if(catId == this.items.design_category_4){
                            this.items.plans_design_category_4 = result.data.data;
                            if(@json($page_type) == 'edit'){
                                const filteredIdCat4 = this.itemPropertyPlans.filter(el => el.plan.design_category_id == this.items.design_category_4);
                                for(let i = 0; i < this.items.plans_design_category_4.length; i++){
                                    if(this.items.plans_design_category_4[i].id == filteredIdCat4[0].plan_id){
                                        this.items.selected_plan_dc_4 = this.items.plans_design_category_4[i].id;
                                    }
                                }
                            }
                        }
                    }).catch((err) => {
                        if(err.response){
                            let idDesignCat = parseInt(err.response.data.design_category_id);
                            if(idDesignCat == this.items.design_category_1){
                                this.items.plans_design_category_1 = null;
                            }
                            if(idDesignCat == this.items.design_category_2){
                                this.items.plans_design_category_2 = null;
                            }
                            if(idDesignCat == this.items.design_category_3){
                                this.items.plans_design_category_3 = null;
                            }
                            if(idDesignCat == this.items.design_category_4){
                                this.items.plans_design_category_4 = null;
                            }
                            console.log(err.response.data);
                        }
                        // console.log("err");
                    });
                    // this.items.loading = false;
                } else if (isSurfaceEmpty){
                    this.items.message_plan_properties = 'Please Input Surface Area Tsubo First';
                }
            },

            getLikeProperty: function() {
                let local = localStorage.getItem('favoritePropertyId');
                this.items.like_property = JSON.parse(local);
            },
            setLikeProperty: function () {
                //this.items.like_property.push(this.items.property_id)
                var properties_like = [];
                let local = localStorage.getItem('favoritePropertyId');
                properties_like = JSON.parse(local) || [];
                if(properties_like.length > 0 && properties_like.includes(this.items.property_id)){
                    let index = properties_like.indexOf(this.items.property_id);
                    console.log("index", index);
                    properties_like.splice(index, 1);
                    localStorage.setItem('favoritePropertyId', JSON.stringify(properties_like));
                    let msg = 'お気に入り物件から削除しました'; //remove like
                    this.$toasted.show( msg, {
                        type: 'success'
                    });
                } else {
                    properties_like.push(this.items.property_id);
                    localStorage.setItem('favoritePropertyId', JSON.stringify(properties_like));
                    let msg = 'お気に入り登録しました'; //add like
                    this.$toasted.show( msg, {
                        type: 'success'
                    });
                }

                this.getLikeProperty();
            },
            setVisitedProperty: function () {
                var properties_visited = [];
                var propertyIdsVisited = [];
                let localVisisted = localStorage.getItem('visitedPropertyId');

                const dateTime = moment(new Date()).format("YYYY/MM/DD HH:mm:ss");

                properties_visited = JSON.parse(localVisisted) || [];
                for (const key in properties_visited) {
                    propertyIdsVisited.push(properties_visited[key].id)
                }

                if(propertyIdsVisited.includes(this.items.property_id)){
                    console.log("already visited");
                    const index = properties_visited.findIndex(item => item.id === this.items.property_id);
                    properties_visited[index] = {
                        id: this.$store.state.preset.property.id,
                        date_browsed: dateTime
                    };
                    localStorage.setItem('visitedPropertyId', JSON.stringify(properties_visited));
                } else {
                    properties_visited.push({
                        id: this.$store.state.preset.property.id,
                        date_browsed: dateTime
                    });
                    localStorage.setItem('visitedPropertyId', JSON.stringify(properties_visited));
                }
            },

            handleImageNotFound: function(event){
                let noimage = @json(asset('img/backend/noimage.png'));
                event.target.src = noimage;
            },
            handleSelectCompany: function(){
                if(this.items.company_id == null){
                    axios.get(root_url + '/api/v1/select2usercompany/')
                        .then((result) => {
                            this.items.list_user = result.data;
                        }).catch((err) => {
                            console.log(err);
                        });
                } else {
                    axios.get(root_url + '/api/v1/select2usercompany/' + this.items.company_id)
                        .then((result) => {
                            this.items.list_user = result.data;
                            if(this.items.user_id != null){
                                const filtered = this.items.list_user.filter(el => el.id == this.items.user_id);
                                if(filtered.length == 0){
                                    this.items.user_id = null;
                                }
                            }
                        }).catch((err) => {
                            console.log(err);
                        });
                }
            },
            handleSelectPrefecture: function(){
                this.items.station_line_id = null;
                this.items.list_station_lines = [];
                this.items.list_stations = [];
                this.items.selected_stations = [];
                this.items.select_nearest_station = null;
                if(this.items.prefecture_id !== null){
                    this.getStationLineByPrefecture(this.items.prefecture_id);
                }
            },
            handleSelectPrefectureCity: function(){
                this.getCityByPrefecture();
            },
            handleSelectStationLine: function(){
                this.items.list_stations = [];
                this.items.selected_stations = [];
                this.items.select_nearest_station = null;
                if(this.items.station_line_id !== null && this.items.prefecture_id !== null){
                    // this.items.list_stations = [];
                    // this.items.selected_stations = [];
                    this.getStationByStationLine(this.items.prefecture_id, this.items.station_line_id);
                }
            },
            getStationLineByPrefecture: function(prefectureId){
                axios.get(root_url + '/api/v1/select2stationline/' + prefectureId)
                        .then((result) => {
                            this.items.list_station_lines = result.data;
                        }).catch((err) => {
                            console.log(err);
                        });
            },
            getStationByStationLine: function(prefectureId, stationLineId){
                axios.get(root_url + '/api/v1/station/getStationByStationLine/' + stationLineId + '/' + prefectureId)
                    .then((result) => {
                        this.items.list_stations = result.data;
                    }).catch((err) => {
                        console.log(err);
                    });
            },
            getCityByPrefecture: function(){
                if(this.items.prefecture_city_id == null){
                    axios.get(root_url + '/api/v1/city/getCityByPrefectureSelect2')
                    .then((result) => {
                        this.items.list_city = result.data;
                    }).catch((err) => {
                        console.log(err);
                    });
                } else {
                    axios.get(root_url + '/api/v1/city/getCityByPrefectureSelect2/' + this.items.prefecture_city_id)
                    .then((result) => {
                        this.items.list_city = result.data;
                        if(this.items.city_id != null){
                            const filtered = this.items.list_city.filter(el => el.id == this.items.city_id);
                            if(filtered.length == 0){
                                this.items.city_id = null;
                            }
                        }
                    }).catch((err) => {
                        console.log(err);
                    });
                }
            },
            clearAll: function(){
                this.items.selected_stations = [];
                this.items.select_nearest_station = null;
            }
            // --------------------------------------------------------------
        }
    }
</script>
@endpush

