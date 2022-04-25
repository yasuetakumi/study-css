@extends('backend._base.content_form')

@section('form_title')
    入力フォーム
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">

        <form ref="registerForm" action="{{route('company.confirm')}}" method="POST" id="form-signup" data-parsley>
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
                                v-model="companies.name"
                                id="input-name"
                                name="name"
                                data-parsley-trigger                = "change focusout"
                                required
                                data-parsley-required-message       = "会社名を入力してください"
                                data-parsley-maxlength              = "50"
                                data-parsley-maxlength-message      = "最大50文字のみ入力してください"
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
                                v-model="companies.name_kana"
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
                                v-model="companies.agent_license_name"
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
                                    v-model="companies.agent_license_renewals"
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
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size:0.7rem">第</span>
                                </div>
                                <input type="text"
                                    v-model="companies.agent_license_number"
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
                                <div class="input-group-append">
                                    <span class="input-group-text" style="font-size:0.7rem">号</span>
                                </div>
                            </div>
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
                                v-model="users.display_name"
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
                                v-model="companies.post_code"
                                required
                                data-parsley-trigger                = "change focusout"
                                data-parsley-required-message       = "担当者名を入力してください"
                                data-parsley-errors-container       = "#errorBlock-postcode"
                                style                               = "width:50%;display:inline-block;vertical-align: middle;"
                                class                               = "form-control @error('postcode') is-invalid @enderror"
                            />
                            <button type="button" @click="searchPostCode" class="btn btn-primary postcode-button" style="line-height:normal;" :disabled="isLoading">
                                <span class="innerset">
                                    <span class="interface">検索</span>
                                    <span class="interface" v-if="isLoading">
                                        <i class="fa fa-spinner fa-spin"></i>
                                    </span>
                                </span>
                            </button>

                            <div id="errorBlock-postcode" class="errorBlock"></div>
                        </div>
                    </div>

                    <!-- prefecture -->
                    <div id="form-group--prefecture" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">都道府県</strong>
                            <span class="label-attach required">必須</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content select2-container">
                            <select id="input-prefecture" name="prefecture" class="select2 form-control @error('prefecture') is-invalid @enderror"
                                v-model                         = "companies.prefecture"
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

                    <!-- City/ Town -->
                    <div id="form-group--city" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">市区町村</strong>
                            <span class="label-attach required">必須</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <input type="text"
                                v-model="companies.city"
                                name="city"
                                id="input-city"
                                required
                                data-parsley-trigger                = "change focusout"
                                data-parsley-required-message       = "市区町村を入力してください"
                                data-parsley-nospace
                                data-parsley-nospace-message        = "スペースなしで入力してください"
                                data-parsley-errors-container       = "#errorBlock-city"
                                class="form-control @error('city') is-invalid @enderror"
                            />
                            <div id="errorBlock-city" class="errorBlock"></div>
                        </div>
                    </div>

                    <!-- Area Number -->
                    <div id="form-group--area_number" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">番地</strong>
                            <span class="label-attach required">必須</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <input type="text"
                                v-model="companies.area_number"
                                name="area_number"
                                id="input-area_number"
                                required
                                data-parsley-trigger                = "change focusout"
                                data-parsley-required-message       = "番地を入力してください"
                                data-parsley-nospace
                                data-parsley-nospace-message        = "スペースなしで入力してください"
                                data-parsley-errors-container       = "#errorBlock-area_number"
                                class="form-control @error('area_number') is-invalid @enderror"
                            />
                            <div id="errorBlock-area_number" class="errorBlock"></div>
                        </div>
                    </div>

                    <!-- Name of building -->
                    <div id="form-group--name_building" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">ビル・マンション</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <input type="text"
                                v-model="companies.name_building"
                                name="name_building"
                                id="input-name_building"
                                data-parsley-trigger                = "change focusout"
                                data-parsley-nospace
                                data-parsley-nospace-message        = "スペースなしで入力してください"
                                data-parsley-errors-container       = "#errorBlock-name_building"
                                class="form-control @error('name_building') is-invalid @enderror"
                            />
                            <div id="errorBlock-name_building" class="errorBlock"></div>
                        </div>
                    </div>

                    <!-- Phone number -->
                    <div id="form-group--phone" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">TEL</strong>
                            <span class="label-attach required">必須</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <input type="text"
                                v-model="companies.phone"
                                name="phone"
                                id="input-phone"
                                required
                                data-parsley-trigger                = "change focusout"
                                data-parsley-required-message       = "TELを入力してください"
                                data-parsley-pattern                = "^\d{2,5}-\d{1,4}-\d{4}$"
                                data-parsley-pattern-message        = "例のような形式を入力してください<br>(2-5桁)-(1-4桁)-(4桁)<br>ex:123-456-7890"
                                data-parsley-errors-container       = "#errorBlock-phone"
                                class="form-control @error('phone') is-invalid @enderror"
                            />
                            <div id="errorBlock-phone" class="errorBlock"></div>
                        </div>
                    </div>

                    <!-- FAX -->
                    <div id="form-group--fax" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">FAX</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <input type="text"
                                v-model="companies.fax"
                                name="fax"
                                id="input-fax"
                                data-parsley-trigger                = "change focusout"
                                data-parsley-errors-container       = "#errorBlock-fax"
                                class="form-control @error('fax') is-invalid @enderror"
                            />
                            <div id="errorBlock-fax" class="errorBlock"></div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div id="form-group--email" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">E-MAIL</strong>
                            <span class="label-attach required">必須</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <input type="text"
                                v-model="companies.email"
                                name="email"
                                id="input-email"
                                required
                                data-parsley-trigger                = "change focusout"
                                data-parsley-type                   = "email"
                                data-parsley-required-message       = "E-MAILを入力してください"
                                data-parsley-type-message           = "メールアドレスを入力してください"
                                data-parsley-remote                 = "{{ route('company.check_email') }}"
                                data-parsley-remote-message         = "このメールはすでに使用されていますので、別のメールアカウントを使用してください"
                                data-parsley-errors-container       = "#errorBlock-email"
                                class="form-control @error('email') is-invalid @enderror"
                            />
                            <div id="errorBlock-email" class="errorBlock"></div>
                        </div>
                    </div>

                    <!-- Hompage URL -->
                    <div id="form-group--url" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">ホームページアドレス</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <input type="text"
                                v-model="companies.url"
                                name="url"
                                id="input-url"
                                data-parsley-trigger                = "change focusout"
                                data-parsley-errors-container       = "#errorBlock-url"
                                data-parsley-type                   = "url"
                                data-parsley-type-message           = "有効なurlを入力してください"
                                class="form-control @error('url') is-invalid @enderror"
                            />
                            <div id="errorBlock-url" class="errorBlock"></div>
                        </div>
                    </div>

                    <!-- Reason -->
                    <div id="form-group--reason" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">利用動機</strong>
                            <span class="label-attach required">必須</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content select2-container">
                            <select id="input-reason" name="reason" class="form-control @error('reason') is-invalid @enderror"
                                v-model                         = "companies.reason"
                                required
                                data-parsley-required-message   = "利用動機を入力してください"
                                data-parsley-trigger            = "change focusout"
                                data-parsley-errors-container   = "#errorBlock-reason"
                            >
                                <option value="1" id="input-reason-1">物件を掲載したい</option>
                                <option value="2" id="input-reason-2">客付け物件を閲覧したい</option>
                                <option value="3" id="input-reason-3">その他</option>
                            </select>
                            <div id="errorBlock-reason" class="errorBlock"></div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div id="form-group--button" class="row form-group">
                        <div class="col-6"></div>

                        <div class="col-6">
                            <button type="button" class="btn btn-primary mr-2 border border-white" style="float:right"
                                @click="register()" :disabled="isLoading">
                                <span class="innerset">
                                    <span class="interface">確認画面へ</span>
                                    <span class="interface" v-if="isLoading">
                                        <i class="fa fa-spinner fa-spin"></i>
                                    </span>
                                    <span class="interface" v-if="!isLoading">
                                        <i class="fa fa-arrow-right"></i>
                                    </span>
                                </span>
                            </button>
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
                status: {
                    mounted: false,
                    loading: false
                },
                // -------------------------------------------------------------

                // -------------------------------------------------------------
                // Preset data
                // -------------------------------------------------------------
                preset: {
                    api: {
                        confirm: @json( route( 'company.confirm')),
                    }
                }
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
        mutations: {
            // --------------------------------------------------------------
            // Set loading state
            // --------------------------------------------------------------
            setLoading: function(state, loading) {
                if (loading) loading = true;
                Vue.set(state.status, 'loading', !!loading);
            },
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // Set mounted state
            // --------------------------------------------------------------
            setMounted: function(state, mounted) {
                if (mounted) mounted = true;
                Vue.set(state.status, 'mounted', !!mounted);
            },
            // --------------------------------------------------------------
        }
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
                users: {
                    display_name : null,
                },
                companies: {
                    name: null,
                    name_kana: null,
                    agent_license_name: null,
                    agent_license_renewals: null,
                    agent_license_number: null,
                    reason: null,
                    post_code : null,
                    prefecture : null,
                    city : null,
                    area_number : null,
                    name_building : null,
                    phone : null,
                    fax : null,
                    email : null,
                    url : "https://",
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
            let vm = this;
            vm.page_title = @json($page_title);
            vm.form_action = @json($form_action);

            vm.companies.name = @json($name ?? null);
            vm.companies.name_kana = @json($name_kana ?? null);
            vm.companies.agent_license_name = @json($agent_license_name ?? null);
            vm.companies.agent_license_renewals = @json($agent_license_renewals ?? null);
            vm.companies.agent_license_number = @json($agent_license_number ?? null);
            vm.companies.reason = @json($reason ?? null);

            vm.users.display_name = @json($display_name ?? null);

            vm.companies.post_code = @json($postcode ?? null);
            vm.companies.prefecture = @json($prefecture ?? null);
            vm.companies.city = @json($city ?? null);
            vm.companies.area_number = @json($area_number ?? null);
            vm.companies.name_building = @json($name_building ?? null);
            vm.companies.phone = @json($phone ?? null);
            vm.companies.fax = @json($fax ?? null);
            vm.companies.email = @json($email ?? null);
            vm.companies.url = @json($url ?? "https://");
        },
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // VUE COMPUTED
        // define a property with custom logic
        // ---------------------------------------------------------------------
        computed: {
            isLoading: function() {
                return this.$store.state.status.loading
            },
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
            searchPostCode: function(){
                let vm = this;

                vm.$store.commit( 'setLoading', true );

                var state       = vm.$store.state;
                var url         = state.preset.api.confirm;

                axios.get(window.location.origin + '/api/v1/postcode/' + vm.companies.post_code)
                .then((response) => {
                    let data = response.data;
                    if(data.status == 201){
                        toastr.error(data.message);
                    }else{
                        vm.companies.prefecture = data.prefecture;
                        vm.companies.city       = data.city;

                        $("#input-prefecture").val(data.prefecture).trigger('change');
                    }

                    vm.$store.commit( 'setLoading', false );
                }).catch((err) => {
                    console.log(err);
                    vm.$store.commit( 'setLoading', false );
                })
            },
            register: function(){
                // ----------------------------------------------------------
                let vm = this; let valid = true;
                //set loading state
                vm.$store.commit( 'setLoading', true );
                // ----------------------------------------------------------
                // Set validation using parsley
                // ----------------------------------------------------------
                let $form   = $('#form-signup');
                let form    = $form.parsley();
                valid       = form.validate();

                // ----------------------------------------------------------
                checkSelect2Class();
                if(valid !== false && $('.parsley-errors-list.filled').length == 0){
                    form.whenValidate({
                    }).done(function() {
                        //submit form after validation success
                        $form.submit();
                    });
                }

                //set loading state
                vm.$store.commit( 'setLoading', false );
            },

            // -----------------------------------------------------------------
        }
        // ---------------------------------------------------------------------
    }
    // -------------------------------------------------------------------------
</script>
@endpush
