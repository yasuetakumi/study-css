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
        @component('backend._components.input_label', ['label' => __('label.real_estate_agency'), 'required' => true, 'name' => 'items.company_name']) @endcomponent
        @component('backend._components.input_select', ['name' => 'postcode_id', 'options' => $postcodes, 'label' => __('label.postcode'), 'required' => 1, 'value' => $item->postcode_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_select', ['name' => 'prefecture_id', 'options' => $prefectures, 'label' => __('label.prefecture'), 'required' => 1, 'value' => $item->prefecture_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_select', ['name' => 'city_id', 'options' => $cities, 'label' => __('label.cities'), 'required' => 1, 'value' => $item->cities_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_text', ['name' => 'location', 'label' => __('label.location'), 'required' => 1, 'value' => $item->location ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_number', ['name' => 'surface_area', 'label' => __('label.surface_area_tsubo'), 'required' => 1, 'value' => $page_type == 'create' ? '' : toTsubo($item->surface_area), 'isReadOnly' => $disableForm, 'method' => 'changePlanBySurfaceArea' ]) @endcomponent

        @component('backend._components.input_number', ['name' => 'rent_amount', 'label' => __('label.rent_amount_man'), 'required' => 1, 'value' => $page_type == 'create' ? '' : toMan($item->rent_amount), 'isReadOnly' => $disableForm]) @endcomponent

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
        @component('backend._components.input_buttons', ['page_type' => $page_type])@endcomponent
    @endcomponent

@endsection

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
                    company_name: null,
                    estimation_loading: true,
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
            estimationLoading: function(){
                return this.items.estimation_loading;
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
            companyName: function(){
                if(this.items.user_id != null){
                    axios.get(root_url + '/company-name/' + this.items.user_id)
                        .then((response) =>{
                            console.log(response.data.company.company_name);
                            this.items.company_name = response.data.company.company_name;
                        }).catch((err) => {
                            this.items.company_name = '';
                            console.log(err);
                        });
                } else{
                    return this.items.company_name;
                }
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

            handleImageNotFound: function(event){
                let noimage = @json(asset('img/backend/noimage.png'));
                event.target.src = noimage;
            },
            // --------------------------------------------------------------
        }
    }
</script>
@endpush

