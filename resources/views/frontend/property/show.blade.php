@php
    $skeleton = 1;
    $furnished = 0;
@endphp
@extends('backend._base.content_form')
@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.top_page')</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{route('prefecture.detail', ['name' => 'akita'])}}">@lang('label.prefecture') @lang('label.search')</a></li> --}}
        <li class="breadcrumb-item"><a href="{{route('property.index')}}"></i> @lang('label.property_list')</a></li>
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
    @component('frontend._components.text_label', ['label' => __('label.real_estate_agent_in_charge'), 'value' => $item->user_id ? $item->user->display_name : '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.real_estate_agency'), 'value' => $item->user_id ? $item->user->company->company_name : '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.postcode'), 'value' => $item->postcode_id ? $item->postcode->postcode : ''])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.prefecture'), 'value' => $item->prefecture_id ? $item->prefecture->display_name : ''])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.cities'), 'value' => $item->city_id ? $item->city->display_name : '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.location'), 'value' => $item->location ?? '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.surface_area_tsubo'), 'value' => $item->surface_area ? toTsubo($item->surface_area, true): ''])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.surface_area_meter'), 'value' => $item->surface_area ? $item->surface_area . '㎡' : '' ])@endcomponent
    {{-- @component('frontend._components.text_label', ['label' => __('label.rent_amount_man'), 'value' => $item->rent_amount ? number_format(toMan($item->rent_amount)) . '万円' : '' ])@endcomponent --}}
    @component('frontend._components.text_label', ['label' => __('label.cost_of_rent'), 'value' => $item->rent_amount ? manPerTsubo($item->rent_amount, $item->surface_area, true) : '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.rent_amount'), 'value' => $item->rent_amount ? number_format($item->rent_amount) . '円' : '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.number_of_floor_underground'), 'value' => $item->number_of_floors_under_ground ? '地下' . $item->number_of_floors_under_ground . '階' : '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.number_of_floor_aboveground'), 'value' => $item->number_of_floors_above_ground ? '地上' . $item->number_of_floors_above_ground . '階' : '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.restaurant_type'), 'value' => $item->property_type_id ? $item->property_type->label_jp : '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.structure'), 'value' => $item->structure_id ? $item->structure->label_jp : '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.deposit'), 'value' => $item->deposit_amount ? toMan($item->deposit_amount, true) : '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.monthly_maintaner'), 'value' => $item->monthly_maintainance_fee ? toMan($item->monthly_maintainance_fee, true) : '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.repayment_conditions'), 'value' => $item->repayment_conditions ?? '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.year_built'), 'value' => $item->date_built ?? '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.renewal_fee'), 'value' => $item->renewal_fee ? number_format($item->renewal_fee) . '円': '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.contract_length'), 'value' => $item->contract_length_in_months  ? $item->contract_length_in_months . 'ヵ月' : '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.moving_fee'), 'value' => $item->special_moving_fee ? toMan($item->special_moving_fee, true) : '' ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.business_terms'), 'value' => $item->business_terms_id ?  $item->business_term->label_jp : ''])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.comments'), 'value' => $item->comment ?? ''])@endcomponent
    @component('frontend._components.text_label', [
        'label' => __('label.is_skeleton'),
        'value' => $item->is_skeleton == $skeleton ? __('label.skeleton') : __('label.furnished')
    ])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.restaurant_cuisine'), 'value' => $item->cuisine_id ? $item->cuisine->label_jp : ''])@endcomponent
    @component('frontend._components.text_label', ['label' => __('label.interior_transfer_price'), 'value' => $item->interior_transfer_price ? toMan($item->interior_transfer_price, true) : '' ])@endcomponent

    @component('frontend._components.display_image', ['label' => __('label.thumbnail_image_main'), 'value' => $item->thumbnail_image_main ?? '']) @endcomponent
    @component('frontend._components.display_image', ['label' => __('label.thumbnail_image') . ' 1', 'value' => $item->thumbnail_image_1 ?? '']) @endcomponent
    @component('frontend._components.display_image', ['label' => __('label.thumbnail_image') . ' 2', 'value' => $item->thumbnail_image_2 ?? '']) @endcomponent
    @component('frontend._components.display_image', ['label' => __('label.thumbnail_image') . ' 3', 'value' => $item->thumbnail_image_3 ?? '']) @endcomponent
    @component('frontend._components.display_image', ['label' => __('label.thumbnail_image') . ' 4', 'value' => $item->thumbnail_image_4 ?? '']) @endcomponent
    @component('frontend._components.display_image', ['label' => __('label.thumbnail_image') . ' 5', 'value' => $item->thumbnail_image_5 ?? '']) @endcomponent
    @component('frontend._components.display_image', ['label' => __('label.thumbnail_image') . ' 6', 'value' => $item->thumbnail_image_6 ?? '']) @endcomponent

    @component('frontend._components.display_image', ['label' => __('label.image') . ' 1', 'value' => $item->image_1 ?? '']) @endcomponent
    @component('frontend._components.display_image', ['label' => __('label.image') . ' 2', 'value' => $item->image_2 ?? '']) @endcomponent
    @component('frontend._components.display_image', ['label' => __('label.image') . ' 3', 'value' => $item->image_3 ?? '']) @endcomponent
    @component('frontend._components.display_image', ['label' => __('label.image') . ' 4', 'value' => $item->image_4 ?? '']) @endcomponent
    @component('frontend._components.display_image', ['label' => __('label.image') . ' 5', 'value' => $item->image_5 ?? '']) @endcomponent
    @component('frontend._components.display_image', ['label' => __('label.image') . ' 6', 'value' => $item->image_6 ?? '']) @endcomponent
    @component('frontend._components.display_image', ['label' => __('label.image') . ' 7', 'value' => $item->image_7 ?? '']) @endcomponent
    @component('frontend._components.display_image', ['label' => __('label.image') . ' 8', 'value' => $item->image_8 ?? '']) @endcomponent
    @component('frontend._components.display_image', ['label' => __('label.image') . ' 9', 'value' => $item->image_9 ?? '']) @endcomponent
    @component('frontend._components.display_image', ['label' => __('label.image') . ' 10', 'value' => $item->image_10 ?? '']) @endcomponent

    @component('frontend._components.display_image360', ['label' => __('label.image_360') . ' 1', 'value' => $item->image_360_1 ?? '']) @endcomponent
    @component('frontend._components.display_image360', ['label' => __('label.image_360') . ' 2', 'value' => $item->image_360_2 ?? '']) @endcomponent
    @component('frontend._components.display_image360', ['label' => __('label.image_360') . ' 3', 'value' => $item->image_360_3 ?? '']) @endcomponent
    @component('frontend._components.display_image360', ['label' => __('label.image_360') . ' 4', 'value' => $item->image_360_4 ?? '']) @endcomponent
    @component('frontend._components.display_image360', ['label' => __('label.image_360') . ' 5', 'value' => $item->image_360_5 ?? '']) @endcomponent


    @include('frontend.property.component.estimation_plans')

    @include('frontend.property.component.customer_inquiry')


    <div class="card mt-3">
        <div class="card-header">
            <h5>{{$item->city->display_name}} で似た物件</h5>
        </div>
        <div class="row py-2">
            <div class="col-12" v-if="property_related == null || property_related == ''">
                <p class="text-center">似た物件は見つかりませんでした</p>
            </div>
            <div v-else class="col-lg-4" v-for="pr in property_related">
                <property-related-list :property="pr"></property-related-list>
            </div>
        </div>
    </div>

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
                    property_related: @json($property_related),
                    property: @json($item),
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
                    selected_dc: 1,
                    list_design_style: null,
                    list_estimation: null,
                    design_category_id: null,
                    loading: false,
                    area_selected: null,
                    like_property: [],
                    property_id: @json($item->id),
                    visited_property: [],
                    design_category_1: 1,
                    design_category_2: 2,
                    design_category_3: 3,
                    design_category_4: 4,
                    estimation_loading: true,
                    designNotFound: false,
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
            this.setVisitedProperty();
            this.getDesignByCategory(1);
                setTimeout(() => {
                    this.estimationIndex();
                }, 3000);
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
            designStyles: function(){
                return this.items.list_design_style;
            },
            property_related: function(){
                return this.$store.state.preset.property_related;
            },
            property: function(){
                return this.$store.state.preset.property;
            },
            isLiked: function () {
                if(this.items.like_property && this.items.like_property.length > 0){
                    let isPropertyLiked = this.items.like_property.find(x => {return x.id == this.items.property_id});
                    if(isPropertyLiked){
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            },
            loadingData: function(){
                return this.items.loading;
            },
            estimationLoading: function(){
                return this.items.estimation_loading;
            },
            pathToImage: function(){
                let pathUploads = @json(asset('uploads/design-styles'));
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
                this.items.estimation_loading = true;
                this.items.loading = true;
                let designCat = event.target.value;
                this.items.selected_dc = event.target.value
                this.items.list_design_style = null;
                this.getDesignByCategory(designCat);
                setTimeout(() => {
                    this.estimationIndex();
                }, 2000);
                this.items.loading = false;
            },
            getDesignByCategory: function(designCat){
                axios.get(root_url + '/api/v1/design-styles/getDesignByCategoryFrontentProperty/' + designCat + '/' + this.items.property_id)
                .then((result) => {
                    this.items.list_design_style = result.data;
                    this.items.designNotFound = false;
                }).catch((err) => {
                    this.items.designNotFound = true;
                });
            },

            estimationIndex: function(){
                //set estimation loading start
                this.items.estimation_loading = true;
                let plans = this.$store.state.preset.property.property_plans;
                let id_plans = '';
                let id_designs = [];
                for (let i = 0; i < plans.length; i++) {
                    // console.log(plans[i]);
                    if(plans[i].plan.design_category_id == this.items.selected_dc){
                        id_plans = plans[i].plan_id;
                    }

                }
                // console.log(id_plans);
                for(let j=0; j < this.items.list_design_style.length; j++){
                    id_designs.push(this.items.list_design_style[j].id)
                }
                let surface_area = this.property.tsubo;
                let tsubo = surface_area.match(/\d/g);
                tsubo = tsubo.join("");
                tsubo = parseInt(tsubo)
                //console.log(tsubo)
                axios.post(root_url + '/api/v1/plans/getEstimationByPlanAndCategory', {
                    plan_id : id_plans,
                    design_category_id : this.items.selected_dc,
                    design_style_id : id_designs,
                    surface_area: tsubo
                    })
                    .then((response) => {
                        this.items.list_estimation = response.data;
                    }).catch((err) => {
                        console.log(err);
                    }).then(() => {
                        //set estimation loading complete
                        this.items.estimation_loading = false;
                    });
            },
            getLikeProperty: function() {
                let local = localStorage.getItem('favoritePropertyId');
                this.items.like_property = JSON.parse(local);
            },
            setLikeProperty: function () {
                //this.items.like_property.push(this.items.property_id)
                var properties_like = [];
                var filterArr = [];
                let local = localStorage.getItem('favoritePropertyId');
                properties_like = JSON.parse(local) || [];
                filterArr = properties_like.filter(x => {return x.id == this.items.property_id});
                if(filterArr.length > 0){
                    let index = properties_like.findIndex(object => {return object.id == this.items.property_id});
                    // console.log("index", index);
                    properties_like.splice(index, 1);
                    localStorage.setItem('favoritePropertyId', JSON.stringify(properties_like));
                    let msg = 'お気に入り物件から削除しました'; //remove like
                    this.$toasted.show( msg, {
                        type: 'success'
                    });
                } else {
                    const dateTime = moment(new Date()).format("YYYY/MM/DD HH:mm:ss");
                    var objectFavorite = {
                        'id': this.items.property_id,
                        'distance': null,
                        'date_added': dateTime
                    };
                    properties_like.push(objectFavorite);
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
