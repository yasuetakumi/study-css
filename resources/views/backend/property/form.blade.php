@php
    $disableForm = false;
    $disableSelect2 = false;
    $companyUserId = '';
    if ($page_type == 'detail') {
        $disableForm = true;
    }
    if(!Auth::check()){
        $disableSelect2 = true;
    } else {
        $disableSelect2 = false;
    }
    if(Auth::guard('user')->check()){
        $disableSelect2 = true;
        $companyUserId = Auth::id();
    }

@endphp
@extends('backend._base.content_form')
@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
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
        {{-- @component('backend._components.input_select', ['name' => 'user_id', 'options' => $users, 'label' => __('label.user'), 'required' => null, 'value' => $item->user_id ?? '', 'isDisabled' => $disableForm]) @endcomponent --}}

        @component('backend._components.vue.form.select2', [
            'name'          => 'user_id',
            'label'         => __('label.real_estate_agent_in_charge'),
            'required'      => 'true',
            'options'       => '$store.state.preset.users_options',
            'model'         => 'items.user_id',
            'disabled'      => 'items.disabled'
        ])
        @endcomponent

        @component('backend._components.input_select', ['name' => 'postcode_id', 'options' => $postcodes, 'label' => __('label.postcode'), 'required' => 1, 'value' => $item->postcode_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_select', ['name' => 'prefecture_id', 'options' => $prefectures, 'label' => __('label.prefecture'), 'required' => 1, 'value' => $item->prefecture_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_select', ['name' => 'city_id', 'options' => $cities, 'label' => __('label.cities'), 'required' => 1, 'value' => $item->cities_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_text', ['name' => 'location', 'label' => __('label.location'), 'required' => 1, 'value' => $item->location ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_number', ['name' => 'surface_area', 'label' => __('label.surface_area_tsubo'), 'required' => 1, 'value' => $page_type == 'create' ? '' : toTsubo($item->surface_area), 'isReadOnly' => $disableForm, 'method' => 'changePlanBySurfaceArea' ]) @endcomponent
        @if ($page_type == 'detail')
            @component('backend._components.input_number', ['name' => 'surface_area_meter', 'label' => __('label.surface_area_meter'), 'required' => null, 'value' => $item->surface_area ?? '', 'isReadOnly' => true ]) @endcomponent
        @endif
        @component('backend._components.input_number', ['name' => 'rent_amount', 'label' => __('label.rent_amount_man'), 'required' => 1, 'value' => $page_type == 'create' ? '' : toMan($item->rent_amount), 'isReadOnly' => $disableForm]) @endcomponent
        @if ($page_type == 'detail')
            @component('backend._components.input_number', ['name' => 'rent_amount_man_tsubo', 'label' => __('label.cost_of_rent'), 'required' => null, 'value' => $item->man_per_tsubo ?? '', 'isReadOnly' => true]) @endcomponent
            @component('backend._components.input_number', ['name' => 'rent_amount_man', 'label' => __('label.rent_amount'), 'required' => null, 'value' => $item->rent_amount ?? '', 'isReadOnly' => true]) @endcomponent
        @endif
        @component('backend._components.input_number', ['name' => 'number_of_floors_under_ground', 'label' => __('label.number_of_floor_underground'), 'required' => null, 'value' => $item->number_of_floors_under_ground ?? '', 'isReadOnly' => $disableForm]) @endcomponent
        @component('backend._components.input_number', ['name' => 'number_of_floors_above_ground', 'label' => __('label.number_of_floor_aboveground'), 'required' => null, 'value' => $item->number_of_floors_above_ground ?? '', 'isReadOnly' => $disableForm]) @endcomponent
        @component('backend._components.input_select', ['name' => 'property_type_id', 'options' => $property_types, 'label' => __('label.restaurant_type'), 'required' => null, 'value' => $item->property_type_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_select', ['name' => 'structure_id', 'options' => $structures, 'label' => __('label.structure'), 'required' => null, 'value' => $item->structure_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_number', ['name' => 'deposit', 'label' => __('label.deposit'), 'required' => null, 'value' => $item->deposit_amount ?? '', 'isReadOnly' => $disableForm]) @endcomponent
        @component('backend._components.input_number', ['name' => 'monthly_maintainance_fee', 'label' => __('label.monthly_maintaner'), 'required' => null, 'value' => $item->monthly_maintainance_fee ?? '', 'isReadOnly' => $disableForm]) @endcomponent
        @component('backend._components.input_text', ['name' => 'repayment', 'label' => __('label.repayment_conditions'), 'required' => null, 'value' => $item->repayment ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_date_picker', ['name' => 'date_built', 'label' => __('label.year_built'), 'required' => null, 'value' => $item->date_built ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_text', ['name' => 'renewal_fee', 'label' => __('label.renewal_fee'), 'required' => null, 'value' => $item->renewal_fee ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_number', ['name' => 'contract_length_in_months', 'label' => __('label.contract_length'), 'required' => null, 'value' => $item->contract_length_in_months ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_number', ['name' => 'special_moving_fee', 'label' => __('label.moving_fee'), 'required' => null, 'value' => $item->special_moving_fee ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_select', ['name' => 'business_term_id', 'options' => $business_terms, 'label' => __('label.business_terms'), 'required' => null, 'value' => $item->business_term_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_text_editor', ['name' => 'comment', 'label' => __('label.comments'), 'required' => null, 'value' => $item->comment ?? '', 'isReadOnly' => $disableForm ]) @endcomponent

        @component('backend._components.input_select', ['name' => 'is_skeleton', 'options' => $is_skeleton, 'label' => __('label.skeleton'), 'required' => true, 'value' => $item->is_skeleton ?? '', 'isDisabled' => $disableForm]) @endcomponent

        @component('backend._components.input_select', ['name' => 'cuisine_id', 'options' => $cuisines, 'label' => __('label.restaurant_cuisine'), 'required' => null, 'value' => $item->cuisine_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_number', ['name' => 'interior_transfer_price', 'label' => __('label.interior_transfer_price'), 'required' => null, 'value' => $item->interior_transfer_price ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        {{-- Plan --}}
        @if ($page_type == 'create' || $page_type == 'edit')
            @include('backend.property.components.plans_design_category')
        @endif
        @component('backend._components.input_image', ['name' => 'thumbnail_image_main', 'label' => __('Thumbnail Image Main'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->thumbnail_image_main ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'thumbnail_image_1', 'label' => __('Thumbnail Image 1'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->thumbnail_image_1 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'thumbnail_image_2', 'label' => __('Thumbnail Image 2'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->thumbnail_image_2 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'thumbnail_image_3', 'label' => __('Thumbnail Image 3'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->thumbnail_image_3 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'thumbnail_image_4', 'label' => __('Thumbnail Image 4'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->thumbnail_image_4 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'thumbnail_image_5', 'label' => __('Thumbnail Image 5'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->thumbnail_image_5 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'thumbnail_image_6', 'label' => __('Thumbnail Image 6'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->thumbnail_image_6 ?? '']) @endcomponent

        @component('backend._components.input_image', ['name' => 'image_1', 'label' => __('Image 1'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_1 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_2', 'label' => __('Image 2'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_2 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_3', 'label' => __('Image 3'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_3 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_4', 'label' => __('Image 4'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_4 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_5', 'label' => __('Image 5'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_5 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_6', 'label' => __('Image 6'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_6 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_7', 'label' => __('Image 7'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_7 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_8', 'label' => __('Image 8'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_8 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_9', 'label' => __('Image 9'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_9 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_10', 'label' => __('Image 10'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_10 ?? '']) @endcomponent

        @component('backend._components.input_image', ['name' => 'image_360_1', 'label' => __('Image 360 1'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_360_1 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_360_2', 'label' => __('Image 360 2'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_360_2 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_360_3', 'label' => __('Image 360 3'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_360_3 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_360_4', 'label' => __('Image 360 4'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_360_4 ?? '']) @endcomponent
        @component('backend._components.input_image', ['name' => 'image_360_5', 'label' => __('Image 360 5'), 'required' => null, 'isDisabled' => $disableForm, 'value' => $item->image_360_5 ?? '']) @endcomponent
        {{-- input button --}}
        @if ($page_type != 'detail')
            @component('backend._components.input_buttons', ['page_type' => $page_type])@endcomponent
        @endif
    @endcomponent
    @if ($page_type == 'detail')
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center mt-4">
                    <div class="col-12">
                        <div id="form-group--plans" class="row form-group">

                            @include('backend._components._input_header',['label'=>'Design Categories', 'required'=>true])

                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                                <div class="field-group clearfix">
                                    @foreach($design_categories as $dc)
                                        <div class="icheck-cyan d-inline">
                                            <input @change="showDesignPlanByCategory" data-id="{{$dc['value']}}" type="radio" value="{{$dc['value']}}" id="input-dc-{{ $dc['value'] }}" name="design_category_id" {{ $loop->first ? 'checked' : '' }} />
                                            <label for="input-dc-{{ $dc['value'] }}" class="text-uppercase mr-5">{{ $dc['label_jp'] }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div id="form-group--plans" class="row form-group">

                            @include('backend._components._input_header',['label'=>'Design Styles', 'required'=>true])

                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                                <div class="field-group clearfix">
                                    <div v-if="loadingData">
                                        <p>Loading Data...</p>
                                    </div>
                                    <div v-else class="row">
                                        <div v-for="dc in designStyles" :key="dc.id" class="col-md-4">
                                            <div style="position: relative;">
                                                <img :src="pathToImage + dc.thumbnail_image" alt="" v-on:error="handleImageNotFound" class="w-100 img-thumbnail d-block mx-auto">
                                            </div>
                                            <div class="my-2">
                                                <p>Design @{{dc.display_name}}</p>
                                                <p>居抜き @{{has_kitchen(dc.id, 1)}} <span :id="'furnished-'+ dc.id"></span></p>
                                                <p>スケルトン @{{has_kitchen(dc.id, 0)}} <span :id="'skeleton-'+ dc.id"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(!Auth::check())
            @component('backend._components.form_container', ["action" => $form_action_inquiry, 'id' => 'customer-inquiry',  "page_type" => 'create', "files" => false])
                <input type="hidden" name="property_id" value="{{ request()->id }}">
                <div class="col-12 border-bottom border-primary">
                    <p class="text-center" style="font-size: 22px">Customer Inquiry</p>
                </div>
                <div id="form-group--contact_us_type" class="row form-group">

                    @include('backend._components._input_header',['label'=>__('Customer Inquiry'), 'required'=> true])

                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                        <select type="text" id="input-contact_us_type" name="contact_us_type_id" class="form-control @error('contact_us_type_id') is-invalid @enderror" value="{{ old('contact_us_type_id') }}" required>
                            @foreach($contact_us_type as $contact)
                                <option value="{{ $contact->id }}" id="input-contact_us_type">{{ $contact->label_jp }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @component('backend._components.input_text', ['name' => 'name', 'label' => __('label.name'), 'required' => 1, 'value' => '', 'isReadOnly' => false ]) @endcomponent
                @component('backend._components.input_email', ['name' => 'email', 'label' => __('label.enterEmailAddress'), 'required' => 1, 'value' => '', 'isReadOnly' => false ]) @endcomponent
                @component('backend._components.input_textarea', ['name' => 'text', 'label' => __('label.comments'), 'required' => 1, 'value' =>'', 'isReadOnly' => false ]) @endcomponent
                <div class="row justify-content-center mt-4">
                    <div class="col-12 text-left mt-4">
                        <button id="inquiry" class="btn btn-primary"> Send Inquiry </button>
                    </div>
                </div>
            @endcomponent
        @endif
        @if ($page_type == 'detail')
            <div class="card mt-3">
                <div class="card-header">
                    <h5>{{$item->city->display_name}} で似た坪数の物件</h5>
                </div>
                <div class="row py-2">
                    <div class="col-12" v-if="property_related == null">
                        <p class="text-center">No Related Property Found</p>
                    </div>
                    <div v-else class="col-lg-4" v-for="pr in property_related">
                        <property-related-list :property="pr"></property-related-list>
                    </div>
                </div>
            </div>
        @endif
    @endif

@endsection

@push('scripts')
    <script type="text/javascript"> var root_url = "{{ url('/') }}";</script>
@endpush

@push('vue-scripts')
@include('frontend._components.property_related_list')
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
                    users_options: @json($users_options),
                    property: @json($item),
                    property_related: @json($property_related),
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
                    area_selected: null,
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
            if(@json($page_type) == 'edit' || @json($page_type) == 'detail'){
                var item = @json($item);
                this.items.user_id = item.user_id;
                this.items.property_id = item.id;
                this.setVisitedProperty();
            } else if (@json($page_type) == 'create' && @json($companyUserId) != null) {
                var id = @json($companyUserId);
                this.items.user_id = id;
            }

            if(@json($page_type) != 'detail'){
                this.changePlanBySurfaceArea();
            }
            if(@json($page_type) == 'detail'){
                this.getDesignByCategory(1);
                setTimeout(() => {
                    this.estimationIndex();
                }, 2000);
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
            areaSelected: function(){
                return this.items.area_selected;
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
                let pathUploads = @json(asset('uploads'));
                return pathUploads + '/';
            },
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
                    if($('.parsley-errors-list.filled').length > 0) {
                        var $form = $('#property-form');
                        $form.parsley().validate();
                        checkSelect2Class();
                    }
                }, 400);
            },
            showDesignPlanByCategory: function(event) {
                this.items.loading = true;
                console.log(event.target.value);
                let designCat = event.target.value;
                this.items.selected_dc = event.target.value
                this.getDesignByCategory(designCat);
                setTimeout(() => {
                    this.estimationIndex();
                }, 2000);
                this.items.loading = false;
            },
            getDesignByCategory: async function(designCat){
                let response = await axios.get(root_url + '/api/v1/design-styles/getDesignByCategory/' + designCat);
                let data = await response.data;
                this.items.list_design_style = data;
            },
            changePlanBySurfaceArea: function(){
                this.getPlanBySurfaceCategory(1);
                this.getPlanBySurfaceCategory(2);
                this.getPlanBySurfaceCategory(3);
                this.getPlanBySurfaceCategory(4);
            },
            getPlanBySurfaceCategory: function (catId) {
                let surface_area = document.querySelector("input[name=surface_area]").value;
                var isSurfaceEmpty = surface_area === '';
                if(isSurfaceEmpty == false && catId != null){
                    this.items.loading = true;
                    axios.get(root_url + '/api/v1/plans/getPlanBySurfaceAndCategory/' + surface_area + '/' + catId)
                    .then((result) => {
                        console.log("RESULTTT", result.data.data);
                        this.items.message_plan_properties = '';
                        if(catId == this.items.design_category_1){
                            this.items.plans_design_category_1 = result.data.data;
                            if(@json($page_type) == 'edit'){
                                    for(let i = 0; i < this.items.plans_design_category_1.length; i++){
                                    if(this.items.plans_design_category_1[i].id == this.itemPropertyPlans[0].plan_id){
                                        this.items.selected_plan_dc_1 = this.items.plans_design_category_1[i].id;
                                    }
                                }
                            }

                        } else if(catId == this.items.design_category_2){
                            this.items.plans_design_category_2 = result.data.data;
                            if(@json($page_type) == 'edit'){
                                for(let i = 0; i < this.items.plans_design_category_2.length; i++){
                                    if(this.items.plans_design_category_2[i].id == this.itemPropertyPlans[1].plan_id){
                                        this.items.selected_plan_dc_2 = this.items.plans_design_category_2[i].id;
                                    }
                                }
                            }

                        } else if(catId == this.items.design_category_3){
                            this.items.plans_design_category_3 = result.data.data;
                            if(@json($page_type) == 'edit'){
                                for(let i = 0; i < this.items.plans_design_category_3.length; i++){
                                    if(this.items.plans_design_category_3[i].id == this.itemPropertyPlans[2].plan_id){
                                        this.items.selected_plan_dc_3 = this.items.plans_design_category_3[i].id;
                                    }
                                }
                            }

                        } else if(catId == this.items.design_category_4){
                            this.items.plans_design_category_4 = result.data.data;
                            if(@json($page_type) == 'edit'){
                                for(let i = 0; i < this.items.plans_design_category_4.length; i++){
                                    if(this.items.plans_design_category_4[i].id == this.itemPropertyPlans[3].plan_id){
                                        this.items.selected_plan_dc_4 = this.items.plans_design_category_4[i].id;
                                    }
                                }
                            }
                        }
                    }).catch((err) => {
                        console.log(err);
                        console.log("checkkk err");
                        this.items.message_plan_properties = 'Plan with surface area : ' + surface_area + '坪' + ' not found!';
                    });
                    this.items.loading = false;
                } else if (isSurfaceEmpty){
                    this.items.message_plan_properties = 'Please Input Surface Area Tsubo First';
                }
            },

            estimationIndex: function(){
                let plans = this.$store.state.preset.property.property_plans;
                let id_plans = '';
                let id_designs = [];
                for (let i = 0; i < plans.length; i++) {
                    if(plans[i].plan.design_category_id == this.items.selected_dc){
                        id_plans = plans[i].plan_id;
                    }

                }
                console.log(id_plans);
                for(let j=0; j < this.items.list_design_style.length; j++){
                    id_designs.push(this.items.list_design_style[j].id)
                }
                let surface_area = document.querySelector("input[name=surface_area]").value;
                axios.post(root_url + '/api/v1/plans/getEstimationByPlanAndCategory', {
                    plan_id : id_plans,
                    design_category_id : this.items.selected_dc,
                    design_style_id : id_designs,
                    surface_area: surface_area
                    })
                    .then((response) => {
                        this.items.list_estimation = response.data;
                    }).catch((err) => {
                        console.log(err);
                    });
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
                    let msg = '気に入り物件から削除しました。'; //remove like
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
                let localVisisted = localStorage.getItem('visitedPropertyId');
                properties_visited = JSON.parse(localVisisted) || [];
                if(properties_visited.includes(this.items.property_id)){
                    console.log("already visited");
                } else {
                    properties_visited.push(this.items.property_id);
                    localStorage.setItem('visitedPropertyId', JSON.stringify(properties_visited));
                }
            },
            has_kitchen: function(id, kitchen){
                if(this.items.list_estimation && this.items.list_estimation.length > 0){

                    // $data = this.items.list_estimation.find();
                    const filtered = this.items.list_estimation.filter(el => el.design_style_id == id && el.has_kitchen == kitchen );
                    if(filtered.length > 0){
                        const grand_total = filtered[0].grand_total / 10000 + '万円';
                        return grand_total;
                    } else {
                        return '-';
                    }

                }
            },
            handleImageNotFound: function(event){
                let noimage = @json(asset('img/backend/noimage.png'));
                event.target.src = noimage;
            },
            // --------------------------------------------------------------
        }
    }
</script>
@endpush

