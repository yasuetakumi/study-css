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
            <form action="{{route('api.property.count')}}" method="POST">
                @csrf
                <div class="card-body clearfix">
                    <div class="search-rent mb-3">
                        <p class="border-left border-primary pl-2">賃料</p>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-control" name="rent_amount_min" id="rent">
                                    <option value="" selected>下限なし</option>
                                    @foreach ($rent_amounts as $rent)
                                    <option value="{{$rent->value}}">{{$rent->label_jp}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-control" name="rent_amount_max" id="rent">
                                    <option value="" selected>上限なし</option>
                                    @foreach ($rent_amounts as $rent)
                                    <option value="{{$rent->value}}">{{$rent->label_jp}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="search-area mb-3">
                        <p class="border-left border-primary pl-2">面積</p>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-control" name="surface_min">
                                    <option value="" selected>下限なし</option>
                                    @foreach ($surface_areas as $surface)
                                    <option value="{{$surface->value}}">{{$surface->label_jp}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-control" name="surface_max">
                                    <option value="" selected>上限なし</option>
                                    @foreach ($surface_areas as $surface)
                                    <option value="{{$surface->value}}">{{$surface->label_jp}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="search-is-skeleton mb-3">
                        <p class="border-left border-primary pl-2">物件の状態</p>
                        <div class="row">
                            <div class="col-12">
                                {{-- @foreach ($is_skeletons as $skeleton)
                                <div class="form-check">
                                    <input class="form-check-input" name="skeleton_{{$skeleton['value']}}" type="checkbox" value="{{$skeleton['value']}}">
                                    <label class="form-check-label">{{$skeleton['label_jp']}}</label>
                                </div>
                                @endforeach --}}
                                <div class="form-check">
                                    <input class="form-check-input" name="skeleton" type="checkbox" value="0">
                                    <label class="form-check-label">スケルトン物件</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="furnished" type="checkbox" value="1">
                                    <label class="form-check-label">居抜き物件</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search-floor mb-3">
                        <p class="border-left border-primary pl-2">階数</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex">
                                    <div class="form-check w-50">
                                        <input class="form-check-input" name="floor0" type="checkbox" value="0">
                                        <label class="form-check-label">地下</label>
                                    </div>
                                    <div class="form-check w-50">
                                        <input class="form-check-input" name="floor1" type="checkbox" value="1">
                                        <label class="form-check-label">1階</label>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="form-check w-50">
                                        <input class="form-check-input" name="floor2" type="checkbox" value="2">
                                        <label class="form-check-label">2階</label>
                                    </div>
                                    <div class="form-check w-50">
                                        <input class="form-check-input" name="floor3" type="checkbox" value="3">
                                        <label class="form-check-label">3階以上</label>
                                    </div>
                                </div>
                                <div class="form-check w-100">
                                    <input class="form-check-input" name="floor4" type="checkbox" value="4">
                                    <label class="form-check-label">複数階一括(1階を含む)</label>
                                </div>
                                <div class="form-check w-100">
                                    <input class="form-check-input" name="floor5" type="checkbox" value="5">
                                    <label class="form-check-label">複数階一括(1階を含まない)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search-property-type mb-3">
                        <p class="border-left border-primary pl-2">出店可能な飲食店の種類</p>
                        <div class="row">
                            <div class="col-12">
                                @foreach ($property_types as $pt)
                                <div class="form-check">
                                    <input class="form-check-input" name="property_type_{{$pt->id}}" type="checkbox" value="{{$pt->id}}">
                                    <label class="form-check-label">{{$pt->label_jp}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="search-walking-distance mb-3">
                        <p class="border-left border-primary pl-2">徒歩</p>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-control" name="walking_distance">
                                    <option value="" selected>選択なし</option>
                                    @foreach ($walking_distances as $walking)
                                    <option value="{{$walking->value}}">{{$walking->label_jp}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="search-property-preference mb-3">
                        <p class="border-left border-primary pl-2">こだわり条件</p>
                        <div class="row">
                            <div class="col-12">
                                @foreach ($property_preferences as $pp)
                                <div class="form-check">
                                    <input class="form-check-input" name="property_preference_{{$pp->id}}" type="checkbox" value="{{$pp->id}}">
                                    <label class="form-check-label">{{$pp->label_jp}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="search-input mb-3">
                        <p class="border-left border-primary pl-2">フリーワード</p>
                        <div class="row">
                            <div class="col-12">
                                <input type="text" name="name" class="form-control" placeholder="恵比寿、山手線、渋谷区など" value="">
                            </div>
                        </div>
                    </div>
                    <div class="result-total">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="font-weight-bold" style="color: #f34e05; font-size: 22px;"></h3> <span>件の該当物件</span>
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
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title mb-0">Property List</h3>
            </div>
            <div class="card-body">
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
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
        },

        created: function(){},

        /*
        ## ------------------------------------------------------------------
        ## VUE COMPUTED
        ## define a property with custom logic
        ## ------------------------------------------------------------------
        */
        computed: {},

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
            // --------------------------------------------------------------
        }
    }
</script>
@endpush
