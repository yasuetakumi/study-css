@extends('backend._base.content_form')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <h3 class="card-title mb-0">
                    条件で絞る
                </h3>
            </div>
            <!-- /.card-header -->
            <form action="{{route('api.property.count')}}" method="POST" id="formElement" @submit.prevent="getListProperty">
                @csrf
                <div class="card-body clearfix">
                    {{-- Surface Area Filter--}}
                    <div class="search-area mb-3">
                        <p class="border-left border-primary pl-2">@lang('label.surface_area')</p>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-control" name="surface_min" @change="getCountProperty">
                                    <option value="" selected>下限なし</option>
                                    @foreach ($surface_areas as $surface)
                                    <option value="{{$surface->value}}">{{$surface->label_jp}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-control" name="surface_max" @change="getCountProperty">
                                    <option value="" selected>上限なし</option>
                                    @foreach ($surface_areas as $surface)
                                    <option value="{{$surface->value}}">{{$surface->label_jp}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Rent Price Filter --}}
                    <div class="search-rent mb-3">
                        <p class="border-left border-primary pl-2">@lang('label.rent_amount')</p>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-control" name="rent_amount_min" id="rent" @change="getCountProperty">
                                    <option value="" selected>下限なし</option>
                                    @foreach ($rent_amounts as $rent)
                                    <option value="{{$rent->value}}">{{$rent->label_jp}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-control" name="rent_amount_max" id="rent" @change="getCountProperty">
                                    <option value="" selected>上限なし</option>
                                    @foreach ($rent_amounts as $rent)
                                    <option value="{{$rent->value}}">{{$rent->label_jp}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Search All  Filter--}}
                    <div class="search-all mb-3">
                        <p class="border-left border-primary pl-2">フリーワード</p>
                        <div class="row">
                            <div class="col-12">
                                <input type="text" name="name" class="form-control" placeholder="恵比寿、山手線、渋谷区など" value="" @change="getCountProperty">
                            </div>
                        </div>
                    </div>
                    {{-- Walking Distance Filter --}}
                    <div class="search-walking-distance mb-3">
                        <p class="border-left border-primary pl-2">@lang('label.walking_distance_from_station')</p>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-control" name="walking_distance" @change="getCountProperty">
                                    <option value="" selected>選択なし</option>
                                    @foreach ($walking_distances as $walking)
                                    <option value="{{$walking->value}}">{{$walking->label_jp}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Floor Underground Filter --}}
                    <div class="search-underground-floor mb-3">
                        <p class="border-left border-primary pl-2">@lang('label.number_of_floor_underground')</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    @foreach ($floor_undergrounds as $underground)
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" name="floor_under[]" type="checkbox" value="{{$underground->value}}" id="floor-under-{{$underground->id}}" @change="getCountProperty">
                                            <label for="floor-under-{{$underground->id}}" class="form-check-label">{{$underground->label_jp}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Floor Aboveground Filter --}}
                    <div class="search-aboveground-floor mb-3">
                        <p class="border-left border-primary pl-2">@lang('label.number_of_floor_aboveground')</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    @foreach ($floor_abovegrounds as $above)
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" name="floor_above[]" type="checkbox" value="{{$above->value}}" id="floor-above-{{$above->id}}" @change="getCountProperty">
                                            <label for="floor-above-{{$above->id}}" class="form-check-label">{{$above->label_jp}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Property Preference Filter --}}
                    <div class="search-property-preference mb-3">
                        <p class="border-left border-primary pl-2">@lang('label.property_preference')</p>
                        <div class="row">
                            <div class="col-12">
                                @foreach ($property_preferences as $pp)
                                <div class="form-check">
                                    <input class="form-check-input" name="property_preference[]" type="checkbox" value="{{$pp->id}}" @change="getCountProperty">
                                    <label class="form-check-label">{{$pp->label_jp}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- Property Type Filter --}}
                    <div class="search-property-type mb-3">
                        <p class="border-left border-primary pl-2">@lang('label.property_types')</p>
                        <div class="row">
                            <div class="col-12">
                                @foreach ($property_types as $pt)
                                <div class="form-check">
                                    <input class="form-check-input" name="property_type[]" type="checkbox" value="{{$pt->id}}" @change="getCountProperty">
                                    <label class="form-check-label">{{$pt->label_jp}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- Is Skeleton Filter --}}
                    <div class="search-is-skeleton mb-3">
                        <p class="border-left border-primary pl-2">@lang('label.skeleton')</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" ref="skeleton" name="skeleton" type="checkbox" value="0" @change="getCountProperty">
                                    <label class="form-check-label">スケルトン物件</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" ref="furnished" name="furnished" type="checkbox" value="1" @change="getCountProperty">
                                    <label class="form-check-label">居抜き物件</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Cuisine Filter --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-secondary w-100" data-toggle="modal" data-target="#exampleModalCenter" :disabled="disabled">
                        居抜き物件をさらに絞る
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog  modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">居抜き物件をさらに絞る</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{-- Cuisines Filter --}}
                                    <div class="search-cuisines mb-3">
                                        <p class="border-left border-primary pl-2">@lang('label.cuisines')</p>
                                        <hr>
                                        <div class="row">
                                            @foreach ($cuisines as $cu)
                                                <div class="col-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cuisine[]" type="checkbox" value="{{$cu->id}}" id="cuisine-{{$cu->id}}" @change="getCountProperty">
                                                        <label for="cuisine-{{$cu->id}}" class="form-check-label">{{$cu->label_jp}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <hr>
                                    {{-- Transfer Price Option --}}
                                    <div class="search-walking-distance mb-3">
                                        <p class="border-left border-primary pl-2">@lang('label.transfer_price_option')</p>
                                        <div class="row">
                                            <div class="col-4">
                                                <select class="form-control" name="transfer_price_min" @change="getCountProperty">
                                                    <option value="" selected>選択なし</option>
                                                    @foreach ($transfer_price_options as $opt)
                                                    <option value="{{$opt->value}}">{{$opt->label_jp}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="form-control" name="transfer_price_max" @change="getCountProperty">
                                                    <option value="" selected>選択なし</option>
                                                    @foreach ($transfer_price_options as $opt)
                                                    <option value="{{$opt->value}}">{{$opt->label_jp}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Show Count Property After Filter --}}
                    <div class="result-total mt-3">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="font-weight-bold" style="color: #f34e05; font-size: 22px;">@{{property_count}} <span style="font-size: 16px; color: black"> 件の該当物件</span> </h3>
                                <button type="submit" class="btn btn-primary px-4 py-2 d-block w-100 mt-3">
                                    <span>
                                        <i class="fas fa-search"></i>
                                        この条件で検索
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-8">
        <div v-if=loading>
            <p>Loading data...</p>
        </div>
        <div v-else-if="property_count == 0">
            <p>No data</p>
        </div>
        <div v-else class="card card-danger" v-for="pd in property_data" :key=pd.id>
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
                    user_id: null,
                    property_count: null,
                    property_data: null,
                    disable: true,
                    loading: false,
                    like_property: [],
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
            this.getCountProperty();
            this.getListProperty();

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
            property_count: function(){
                return this.items.property_count;
            },
            property_data: function(){
                return this.items.property_data;
            },
            disabled: function(){
                return this.items.disable;
            },
            loading: function() {
                return this.items.loading;
            },
            isLiked: function () {
                if(this.items.property_data.length > 0 && this.items.property_data.includes(this.items.like_property)){
                    return 'fas';
                } else {
                    return 'far';
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
            getListProperty: function(event) {
                this.items.loading = true;
                let data = new FormData(formElement);
                axios.post(root_url + '/api/v1/property/getCountProperty', data)
                    .then((result) => {
                        this.items.property_data = result.data.data.result;
                    }).catch((err) => {
                        console.log(err);
                });
                this.items.loading = false;
            },
            getCountProperty: function(event) {
                if(this.$refs.skeleton.checked == true && this.$refs.furnished.checked == true){
                    this.items.disable = false;
                } else {
                    this.items.disable = true;
                }
                let data = new FormData(formElement);
                axios.post(root_url + '/api/v1/property/getCountProperty', data)
                    .then((result) => {
                        this.items.property_count = result.data.data.count;
                        console.log(data);
                    }).catch((err) => {
                        console.log(err);
                });
            },
            getLikeProperty: function() {
                let local = localStorage.getItem('favoritePropertyId');
                this.items.like_property = JSON.parse(local);
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
