@extends('backend._base.content_form')

@section('form_title')
    入力フォーム
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">

        <form action="{{route('company.confirm')}}" method="POST" id="companyForm" data-parsley>
            @csrf
            <div class="row">
                <div class="col-12">
                    <!-- Company Name -->
                    <div id="form-group--name" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">会社名</strong>
                            <span class="label-attach required">必須</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <input type="text" 
                                v-model="items.name"
                                id="input-name" 
                                name="name"
                                data-parsley-trigger                = "change focusout"
                                required
                                data-parsley-required-message       = "会社名を入力してください"
                                data-parsley-fullwidthkanji
                                data-parsley-fullwidthkanji-message = "漢字テキストを入力してください"
                                data-parsley-errors-container       = "#errorBlock-name"
                                class="form-control @error('name') is-invalid @enderror"
                            />
                            <div id="errorBlock-name" class="errorBlock"></div>
                        </div>
                    </div>

                    <!-- Company Name Kana-->
                    <div id="form-group--name_kana" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">会社名カナ(全角入力)</strong>
                            <span class="label-attach required">必須</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <input type="text" 
                                v-model="items.name_kana"
                                id="input-name_kana" 
                                name="name_kana"
                                required
                                data-parsley-trigger                = "change focusout"
                                data-parsley-required-message       = "会社名カナ(全角入力)を入力してください"
                                data-parsley-fullwidthkatakana
                                data-parsley-fullwidthkatakana-message = "カタカナを入力してください"
                                data-parsley-errors-container       = "#errorBlock-name_kana"
                                class="form-control @error('name_kana') is-invalid @enderror"
                            />
                            <div id="errorBlock-name_kana" class="errorBlock"></div>
                        </div>
                    </div>

                    <!-- Company License -->
                    <div id="form-group--license" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5 bold">宅建番号</strong>
                        </div>
                        <!--agent_license_name -->
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-content">
                            <input type="text" 
                                v-model="items.agent_license_name"
                                id="input-agent_license_name" 
                                name="agent_license_name"
                                data-parsley-trigger                = "change focusout"
                                data-parsley-fullwidthjpntext
                                data-parsley-fullwidthjpntext-message = "スペースなしで日本語のテキストを入力してくださ"
                                data-parsley-errors-container       = "#errorBlock-agent_license_name"
                                class="form-control @error('agent_license_name') is-invalid @enderror"
                            />
                            <div id="errorBlock-agent_license_name" class="errorBlock"></div>
                        </div>
                        <!--agent_license_renewals -->
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-content">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size:0.7rem">(</span>
                                </div>
                                <input type="text" 
                                    v-model="items.agent_license_renewals"
                                    id="input-agent_license_renewals" 
                                    name="agent_license_renewals"
                                    data-parsley-trigger                = "change focusout"
                                    data-parsley-type                   = "digits"
                                    data-parsley-type-message           = "番号のみを入力してください"
                                    data-parsley-length                 = "[1,2]"
                                    data-parsley-length-message         = "1桁または2桁の数字のみを入力してください"
                                    data-parsley-errors-container       = "#errorBlock-agent_license_renewals"
                                    class="form-control @error('agent_license_renewals') is-invalid @enderror"
                                />
                                <div class="input-group-append">
                                    <span class="input-group-text" style="font-size:0.7rem">)</span>
                                </div>
                            </div>
                            <div id="errorBlock-agent_license_renewals" class="errorBlock"></div>
                        </div>
                        <!--agent_license_number -->
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-content">
                            <input type="text" 
                                v-model="items.agent_license_number"
                                id="input-agent_license_number" 
                                name="agent_license_number"
                                data-parsley-trigger                = "change focusout"
                                data-parsley-type                   = "digits"
                                data-parsley-type-message           = "番号のみを入力してください"
                                data-parsley-length                 = "[6,6]"
                                data-parsley-length-message         = "6桁の数字を入力してください"
                                data-parsley-errors-container       = "#errorBlock-agent_license_number"
                                class="form-control @error('agent_license_number') is-invalid @enderror"
                            />
                            <div id="errorBlock-agent_license_number" class="errorBlock"></div>
                        </div>
                    </div>

                    <!-- Person in Charge-->
                    <div id="form-group--display_name" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">担当者名</strong>
                            <span class="label-attach required">必須</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <input type="text" 
                                v-model="items.display_name"
                                id="input-display_name" 
                                name="display_name"
                                required
                                data-parsley-trigger                = "change focusout"
                                data-parsley-required-message       = "担当者名を入力してください"
                                class="form-control @error('name_kana') is-invalid @enderror"
                            />
                            <div id="errorBlock-name_kana" class="errorBlock"></div>
                        </div>
                    </div>

                    <!-- postcode-->
                    <div id="form-group--postcode" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">郵便番号</strong>
                            <span class="label-attach required">必須</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <input type="text" id="input-postcode" name="postcode" 
                                v-model="items.companies.post_code"
                                required
                                data-parsley-trigger                = "change focusout"
                                data-parsley-required-message       = "担当者名を入力してください"
                                data-parsley-errors-container       = "#errorBlock-postcode"
                                style="width:50%;display:inline-block;vertical-align: middle;" 
                                class="form-control @error('postcode') is-invalid @enderror" 
                            />
                            <button type="button" id="postcodeserch" class="address-search btn btn-primary postcode-button" style="line-height:normal;">検索</button>
                            <div id="errorBlock-postcode" class="errorBlock"></div>
                        </div>
                    </div>

                    <!-- prefecture -->
                    <div id="form-group--prefecture" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">郵便番号</strong>
                            <span class="label-attach required">必須</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content select2-container">
                            <select id="input-prefecture" name="prefecture" class="select2 form-control @error('prefecture') is-invalid @enderror" 
                                v-model                         = "items.companies.prefecture"
                                required
                                data-parsley-required-message   = "都道府県を入力してください"
                                data-parsley-trigger            = "change focusout"
                                data-parsley-errors-container   = "#errorBlock-prefecture"
                            >
                                    <option value="" selected>@lang('label.empty_value')</option>    
                                @foreach($prefecture_options as $id => $label)
                                    <option value="{{ $id }}" id="input-prefecture-{{ $id }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            <div id="errorBlock-prefecture" class="errorBlock"></div>
                        </div>
                    </div>

                    <!-- Person in Charge-->
                    <div id="form-group--city" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">市区町村</strong>
                            <span class="label-attach required">必須</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <input type="text" 
                                v-model="items.city"
                                id="input-city" 
                                name="city"
                                required
                                data-parsley-trigger                = "change focusout"
                                data-parsley-required-message       = "市区町村を入力してください"
                                data-parsley-errors-container       = "#errorBlock-city"
                                class="form-control @error('city') is-invalid @enderror"
                            />
                            <div id="errorBlock-city" class="errorBlock"></div>
                        </div>
                    </div>

                </div>
            </div>
        </form>

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
                page_title : null,
                form_action : null,
                // -------------------------------------------------------------
                // Form result set here
                // -------------------------------------------------------------
                items: {
                    name: null,
                    name_kana: null,
                    agent_license_name: null,
                    agent_license_renewals: null,
                    agent_license_number: null,
                    users: {
                        display_name : null,
                    },
                    companies: {
                        post_code : null,
                        prefecture : null,
                        city : null,
                        area_number : null,
                        name_building : null,
                        phone : null,
                        fax : null,
                        email : null,
                        url : null,
                    },
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
        },
        // ---------------------------------------------------------------------

        created: function() {
        },
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // VUE COMPUTED
        // define a property with custom logic
        // ---------------------------------------------------------------------
        computed: {
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
            // -----------------------------------------------------------------
            refreshParsley: function() {
                setTimeout(() => {
                    if ($('.parsley-errors-list.filled').length > 0) {
                        var $form = $('#company-form');
                        $form.parsley().validate();
                        checkSelect2Class();
                    }
                }, 400);
            },
            // -----------------------------------------------------------------
            
            // -----------------------------------------------------------------
        }
        // ---------------------------------------------------------------------
    }
    // -------------------------------------------------------------------------
</script>
@endpush
