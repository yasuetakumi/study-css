@php
    $route = Route::currentRouteName();
    $disableForm = false;
    if ($route == 'admin.property.detail') {
        $disableForm = true;
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

@endsection

@section('content')
    @component('backend._components.form_container', ["action" => $form_action, 'id' => 'property-form',  "page_type" => $page_type, "files" => true])
        {{-- @component('backend._components.input_select', ['name' => 'user_id', 'options' => $users, 'label' => __('label.user'), 'required' => null, 'value' => $item->user_id ?? '', 'isDisabled' => $disableForm]) @endcomponent --}}

        @component('backend._components.vue.form.select2', [
            'name'          => 'user_id',
            'label'         => __('label.company'),
            'required'      => 'false',
            'options'       => '$store.state.preset.users_options',
            'model'         => 'items.user_id',
            'disabled'      => $disableForm
        ])
        @endcomponent

        @component('backend._components.input_select', ['name' => 'postcode_id', 'options' => $postcodes, 'label' => __('label.postcode'), 'required' => 1, 'value' => $item->postcode_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_select', ['name' => 'prefecture_id', 'options' => $prefectures, 'label' => __('label.prefecture'), 'required' => null, 'value' => $item->prefecture_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_select', ['name' => 'cities_id', 'options' => $cities, 'label' => __('label.cities'), 'required' => null, 'value' => $item->cities_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_text', ['name' => 'location', 'label' => __('label.location'), 'required' => null, 'value' => $item->location ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_text', ['name' => 'surface_area', 'label' => __('label.surface_area_meter'), 'required' => null, 'value' => $item->surface_area ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_text', ['name' => 'surface_area', 'label' => __('label.surface_area_tsubo'), 'required' => null, 'value' => $item->surface_area ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_number', ['name' => 'rent_amount', 'label' => __('label.rent_amount'), 'required' => null, 'value' => $item->rent_amount ?? '', 'isReadOnly' => $disableForm]) @endcomponent
        @component('backend._components.input_number', ['name' => 'cost_of_rent', 'label' => __('label.cost_of_rent'), 'required' => null, 'value' => $item->rent_amount ?? '', 'isReadOnly' => $disableForm]) @endcomponent
        @component('backend._components.input_number', ['name' => 'rent_amount_man', 'label' => __('label.rent_amount_man'), 'required' => null, 'value' => $item->rent_amount ?? '', 'isReadOnly' => $disableForm]) @endcomponent
        @component('backend._components.input_number', ['name' => 'number_of_floor_underground', 'label' => __('label.number_of_floor_underground'), 'required' => null, 'value' => $item->number_of_floor_aboveground ?? '', 'isReadOnly' => $disableForm]) @endcomponent
        @component('backend._components.input_number', ['name' => 'number_of_floor_aboveground', 'label' => __('label.number_of_floor_aboveground'), 'required' => null, 'value' => $item->number_of_floor_aboveground ?? '', 'isReadOnly' => $disableForm]) @endcomponent
        @component('backend._components.input_select', ['name' => 'property_type_id', 'options' => $property_types, 'label' => __('label.restaurant_type'), 'required' => null, 'value' => $item->property_type_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_select', ['name' => 'structure_id', 'options' => $structures, 'label' => __('label.structure'), 'required' => null, 'value' => $item->structure_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_number', ['name' => 'deposit', 'label' => __('label.deposit'), 'required' => null, 'value' => $item->deposit_amount ?? '', 'isReadOnly' => $disableForm]) @endcomponent
        @component('backend._components.input_number', ['name' => 'monthly_maintainance_fee', 'label' => __('label.monthly_maintaner'), 'required' => null, 'value' => $item->monthly_maintainance_fee ?? '', 'isReadOnly' => $disableForm]) @endcomponent
        @component('backend._components.input_text', ['name' => 'repayment_conditions', 'label' => __('label.repayment_conditions'), 'required' => null, 'value' => $item->repayment_conditions ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_date_picker', ['name' => 'date_built', 'label' => __('label.year_built'), 'required' => null, 'value' => $item->date_built ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_text', ['name' => 'renewal_fee', 'label' => __('label.renewal_fee'), 'required' => null, 'value' => $item->renewal_fee ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_number', ['name' => 'contract_length_in_months', 'label' => __('label.contract_length'), 'required' => null, 'value' => $item->contract_length_in_months ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_number', ['name' => 'special_moving_fee', 'label' => __('label.moving_fee'), 'required' => null, 'value' => $item->special_moving_fee ?? '', 'isReadOnly' => $disableForm ]) @endcomponent
        @component('backend._components.input_select', ['name' => 'business_term_id', 'options' => $business_terms, 'label' => __('label.business_terms'), 'required' => null, 'value' => $item->business_term_id ?? '', 'isDisabled' => $disableForm]) @endcomponent
        @component('backend._components.input_text_editor', ['name' => 'comment', 'label' => __('label.comments'), 'required' => null, 'value' => $item->comment ?? '', 'isReadOnly' => $disableForm ]) @endcomponent

        @component('backend._components.input_select', ['name' => 'is_skeleton', 'options' => $is_skeleton, 'label' => __('label.skeleton'), 'required' => null, 'value' => $item->is_skeleton ?? '', 'isDisabled' => $disableForm]) @endcomponent

        @component('backend._components.input_select', ['name' => 'cuisine_id', 'options' => $cuisines, 'label' => __('label.restaurant_cuisine'), 'required' => null, 'value' => $item->cuisine_id ?? '', 'isDisabled' => $disableForm]) @endcomponent

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
        @if ($route != 'admin.property.detail')
            @component('backend._components.input_buttons', ['page_type' => $page_type])@endcomponent
        @endif
    @endcomponent
    @if ($route == 'admin.property.detail')
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center mt-4">
                    <div class="col-12 border-bottom border-primary">
                        <p class="text-center" style="font-size: 22px">STEP 1</p>
                    </div>
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
                                    {{-- @foreach($design_styles as $ds)

                                    @endforeach --}}
                                    <div v-if="loadingData">
                                        <p>Loading Data...</p>
                                    </div>
                                    <div v-else>
                                        <div class="icheck-cyan d-inline" v-for="dc in designStyles" :key="dc.id">
                                            <input type="radio" :value="dc.id" :id="dc.display_name" name="design_style_id" />
                                            <label :for="dc.display_name" class="text-uppercase mr-5">@{{dc.display_name}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-12 border-bottom border-primary">
                        <p class="text-center" style="font-size: 22px">STEP 2</p>
                    </div>
                    <div class="col-12">
                        <div id="form-group--plans" class="row form-group">

                            @include('backend._components._input_header',['label'=>'Plans', 'required'=>true])

                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                                <div class="field-group clearfix">
                                    {{-- @foreach($plans as $plan)
                                        <div class="icheck-cyan d-inline">
                                            <input type="radio" value="{{$plan->id}}" id="input-plan-{{ $plan->id }}" name="plan_id" />
                                            <label for="input-plan-{{ $plan->id }}" class="text-uppercase mr-5">{{ $plan->display_name }}</label>
                                        </div>
                                    @endforeach --}}
                                    {{-- <p class="text-center" style="font-size: 18px">Select Plan </p> --}}
                                    <div style="margin-bottom: 2rem;">
                                        <div class="icheck-cyan d-inline mb-5" v-for="area in area_groups" :key="area.id">
                                            <input type="radio" :value="area.id" :id="area.display_name" name="area_id" @change="showPlanByArea" />
                                            <label :for="area.display_name" class="text-uppercase mr-5">@{{area.display_name}}</label>
                                        </div>
                                        {{-- <div v-else>
                                            <p>No available</p>
                                        </div> --}}
                                    </div>

                                    <div v-if="loadingData">
                                        <p>Loading Data...</p>
                                    </div>
                                    <div v-else>
                                        <div class="icheck-cyan d-inline" v-for="plan in plans" :key="plan.id">
                                            <input type="radio" :value="plan.id" :id="plan.display_name" name="plan_id" @change="showTsuboSlider(plan.area_group_id)" />
                                            <label :for="plan.display_name" class="text-uppercase mr-5">@{{plan.display_name}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-12 border-bottom border-primary">
                        <p class="text-center" style="font-size: 22px">STEP 3</p>
                    </div>
                    <div class="col-12">
                        {{-- @component('backend._components.input_text', ['name' => 'tsubo_area', 'label' => __('Tsubo Area'), 'required' => null, 'value' => 'items.tsubo_value']) @endcomponent --}}
                        <input v-if="tsuboSlider === 6" id="slider" class="slider-red input slider w-100" step="1" type="range" min="10" max="14" value="10" @change="showSliderValue">
                        <input v-if="tsuboSlider === 1 "id="slider" class="slider-red input slider w-100" step="1" type="range" min="15" max="19" value="15" @change="showSliderValue">
                        <input v-if="tsuboSlider === 2" id="slider" class="slider-red input slider w-100" step="1" type="range" min="20" max="29" value="20" @change="showSliderValue">
                        <input v-if="tsuboSlider === 3" id="slider" class="slider-red input slider w-100" step="1" type="range" min="30" max="39" value="30" @change="showSliderValue">
                        <input v-if="tsuboSlider === 4" id="slider" class="slider-red input slider w-100" step="1" type="range" min="40" max="49" value="40" @change="showSliderValue">
                        <input type="hidden" id="input-tsubo_area" :value="items.tsubo_value">
                        <p class="text-center" style="font-size: 20px; margin-top: 2rem;">@{{items.tsubo_value}}坪</p>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-12 border-bottom border-primary">
                        <p class="text-center" style="font-size: 22px">Do You Want Kitchen</p>
                    </div>
                    <div class="col-12">
                        <div id="form-group--plans" class="row form-group">

                            @include('backend._components._input_header',['label'=>'Has Kitchen', 'required'=>true])

                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                                <div class="field-group clearfix">
                                    @foreach($has_kitchens as $hs)
                                        <div class="icheck-cyan d-inline">
                                            <input type="radio" value="{{$hs['value']}}" id="input-hs-{{ $hs['value'] }}" name="has_kitchen" {{$loop->first ? 'checked' : ''}}/>
                                            <label for="input-hs-{{ $hs['value'] }}" class="text-uppercase mr-5">{{ $hs['label_jp'] }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-12 border-bottom border-primary">
                        <p class="text-center" style="font-size: 22px">Estimation Index</p>
                    </div>
                    <div class="col-12 text-left mt-4">
                        <button id="estimate" class="btn btn-primary"> Estimation Index</button>
                        <br>
                        <div class="d-flex mt-4">
                            <p style="font-size: 20px">Estimation Index Value : </p>
                            <p id="estimation_index" style="font-size: 20px; margin-left:5px;"> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@push('scripts')
    <script type="text/javascript"> var root_url = "{{ url('/') }}";</script>
    <script>
        $( document ).ready(function() {
            // $('#slider').on('change', function() {
            //     var value = this.value;
            //     $('#input-tsubo_area').val(value);
            // });
            $('#estimate').on('click', function() {
                var design_category_id = $("input[name='design_category_id']:checked").val();
                var design_style_id = $("input[name='design_style_id']:checked").val();
                var plan_id = $("input[name='plan_id']:checked").val();
                var tsubo_area = $('#input-tsubo_area').val();
                var has_kitchen = $("input[name='has_kitchen']:checked").val();
                var uri = root_url + '/api/v1/plans/getGrandTotalEstimation/' + plan_id + '/' + tsubo_area + '/' + design_style_id + '/' + has_kitchen + '/' + design_category_id
                console.log(plan_id);
                console.log(tsubo_area);
                console.log(design_style_id);
                console.log(has_kitchen);
                console.log(design_category_id);
                console.log(uri);
                $.ajax({
                    type: 'GET',
                    dataType:"json",
                    url: uri,
                    //url: 'http://localhost:8000/api/v1/plans/getGrandTotalEstimation/13/15/2/0/1',
                    success: function (response) {
                        console.log(response);
                        $('#estimation_index').text(response.min);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus); alert("Error: " + errorThrown);
                    }
                });
            });
        });

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
                    design_styles: @json($design_styles),
                    design_categories: @json($design_categories),
                    area_groups: [
                        { 'id': 6, 'display_name': '10〜14坪' },
                        { 'id': 1, 'display_name': '15〜19坪' },
                        { 'id': 2, 'display_name': '20〜29坪' },
                        { 'id': 3, 'display_name': '30〜39坪' },
                        { 'id': 4, 'display_name': '40坪〜' },
                    ],
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
                    selected_dc: false,
                    list_design_style: null,
                    list_plans: null,
                    loading: false,
                    area_selected: null,
                    tsubo_value: null,
                    tsubo_slider: 6,
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
            }
        },

        created: async function(){
            const response = await fetch(root_url + '/api/v1/design-styles/getDesignByCategory/1');
            const data = await response.json();
            this.items.list_design_style = data;

            const response2 = await fetch(root_url + '/api/v1/plans/getPlansByCategory/1');
            const data2 = await response2.json();
            this.items.list_plans = data2;
        },

        /*
        ## ------------------------------------------------------------------
        ## VUE COMPUTED
        ## define a property with custom logic
        ## ------------------------------------------------------------------
        */
        computed: {
            designCategories: function(){
                return this.$store.state.preset.design_categories;
            },
            designStyles: function(){
                return this.items.list_design_style;
            },
            plans: function(){
                return this.items.list_plans;
            },
            area_groups: function(){
                return this.$store.state.preset.area_groups;
            },
            loadingData: function(){
                return this.items.loading;
            },
            areaSelected: function(){
                return this.items.area_selected;
            },
            tsuboSlider: function(){
                return this.items.tsubo_slider;
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
                    if($('.parsley-errors-list.filled').length > 0) {
                        var $form = $('#property-form');
                        $form.parsley().validate();
                        checkSelect2Class();
                    }
                }, 400);
            },
            showDesignPlanByCategory: async function(event) {
                this.items.loading = true;
                console.log(event.target.value);
                let designCat = event.target.value;

                let response = await fetch(root_url + '/api/v1/design-styles/getDesignByCategory/' + designCat);
                let data = await response.json();
                this.items.list_design_style = data;

                let response2 = await fetch(root_url + '/api/v1/plans/getPlansByCategory/' + designCat);
                let data2 = await response2.json();
                this.items.list_plans = data2;


                this.items.loading = false;
            },
            showPlanByArea: function(event) {
                let area_id = event.target.value;
                this.items.area_selected = area_id;
            },
            showTsuboSlider: function(areaId) {
                console.log(areaId);
                this.items.tsubo_slider = areaId;
                if(areaId == 6){
                    this.items.tsubo_value = 10;
                } else if(areaId == 1){
                    this.items.tsubo_value = 15;
                } else if(areaId == 2){
                    this.items.tsubo_value = 20;
                } else if(areaId == 3){
                    this.items.tsubo_value = 30;
                } else if(areaId == 4){
                    this.items.tsubo_value = 40;
                }
            },
            showSliderValue: function(event){
                this.items.tsubo_value = event.target.value;
            }
            // --------------------------------------------------------------
        }
    }
</script>
@endpush

