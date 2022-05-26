@extends('backend._base.content_form')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.top_page')</a></li>
        <li class="breadcrumb-item"><a href="{{route('company.register')}}">会員 （不動産業者） 登録申し込み</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('form_title')
    企業の情報確認
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">

        <form ref="registerForm" action="{{route('company.register')}}" method="GET" id="form-signup" data-parsley>
            @csrf
            <div class="row">
                <div class="col-12">
                    <!-- Company Name -->
                    <div id="form-group--name" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">会社名</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <span>@{{companies.name}}</span>
                            <input type="hidden"
                                v-model="companies.name"
                                name="name"
                            />
                        </div>
                    </div>

                    <!-- Company Name Kana-->
                    <div id="form-group--name_kana" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">会社名カナ(全角入力)</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <span>@{{companies.name_kana}}</span>
                            <input type="hidden"
                                v-model="companies.name_kana"
                                name="name_kana"
                            />
                        </div>
                    </div>

                    <!-- Company License -->
                    <div id="form-group--license" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5 bold">宅建番号</strong>
                        </div>
                        <!--agent_license_name -->
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <span>@{{companies.agent_license_name}}</span> (<span>@{{companies.agent_license_renewals}}</span>) 第<span>@{{companies.agent_license_number}}</span>号
                            <input type="hidden"
                                v-model="companies.agent_license_name"
                                name="agent_license_name"
                            />
                            <input type="hidden"
                                v-model="companies.agent_license_renewals"
                                name="agent_license_renewals"
                            />
                            <input type="hidden"
                                v-model="companies.agent_license_number"
                                name="agent_license_number"
                            />
                        </div>
                    </div>

                    <!-- Person in Charge-->
                    <div id="form-group--display_name" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">担当者名</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <span>@{{users.display_name}}</span>
                            <input type="hidden"
                                v-model="users.display_name"
                                name="display_name"
                            />
                        </div>
                    </div>

                    <!-- postcode-->
                    <div id="form-group--postcode" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">郵便番号</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <span>@{{companies.post_code}}</span>
                            <input type="hidden"
                                v-model="companies.post_code"
                                name="postcode"
                            />
                        </div>
                    </div>

                    <!-- prefecture -->
                    <div id="form-group--prefecture" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">都道府県</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content select2-container">
                            <span>@{{companies.prefecture}}</span>
                            <input type="hidden"
                                v-model="companies.prefecture"
                                name="prefecture"
                            />
                        </div>
                    </div>

                    <!-- City/ Town -->
                    <div id="form-group--city" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">市区町村</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <span>@{{companies.city}}</span>
                            <input type="hidden"
                                v-model="companies.city"
                                name="city"
                            />
                        </div>
                    </div>

                    <!-- Area Number -->
                    <div id="form-group--area_number" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">番地</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <span>@{{companies.area_number}}</span>
                            <input type="hidden"
                                v-model="companies.area_number"
                                name="area_number"
                            />
                        </div>
                    </div>

                    <!-- Name of building -->
                    <div id="form-group--name_building" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">ビル・マンション</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <span>@{{companies.name_building}}</span>
                            <input type="hidden"
                                v-model="companies.name_building"
                                name="name_building"
                            />
                        </div>
                    </div>

                    <!-- Phone number -->
                    <div id="form-group--phone" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">TEL</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <span>@{{companies.phone}}</span>
                            <input type="hidden"
                                v-model="companies.phone"
                                name="phone"
                            />
                        </div>
                    </div>

                    <!-- FAX -->
                    <div id="form-group--fax" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">FAX</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <span>@{{companies.fax}}</span>
                            <input type="hidden"
                                v-model="companies.fax"
                                name="fax"
                            />
                        </div>
                    </div>

                    <!-- Email -->
                    <div id="form-group--email" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">E-MAIL</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <span>@{{companies.email}}</span>
                            <input type="hidden"
                                v-model="companies.email"
                                name="email"
                            />
                        </div>
                    </div>

                    <!-- Hompage URL -->
                    <div id="form-group--url" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">ホームページアドレス</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <span>@{{companies.url}}</span>
                            <input type="hidden"
                                v-model="companies.url"
                                name="url"
                            />
                        </div>
                    </div>

                    <!-- Reason -->
                    <div id="form-group--reason" class="row form-group">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                            <strong class="h5">利用動機</strong>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content select2-container">
                            <span v-if="companies.reason == 1">物件を掲載したい</span>
                            <span v-else-if="companies.reason == 2">客付け物件を閲覧したい</span>
                            <span v-else-if="companies.reason == 3">その他</span>
                            <span v-else></span>
                            <input type="hidden"
                                v-model="companies.reason"
                                name="reason"
                            />
                        </div>
                    </div>

                    <!-- Button -->
                    <div id="form-group--button" class="row form-group">
                        <div class="col-6">
                            <button type="submit" class="btn btn-secondary mr-2 border border-white" style="float:left"
                                :disabled="isLoading">
                                <span class="innerset">
                                    <span class="interface" v-if="!isLoading">
                                        <i class="fa fa-arrow-left"></i>
                                    </span>
                                    <span class="interface">登録</span>
                                    <span class="interface" v-if="isLoading">
                                        <i class="fa fa-spinner fa-spin"></i>
                                    </span>
                                </span>
                            </button>
                        </div>

                        <div class="col-6">
                            <button type="button" class="btn btn-success mr-2 border border-white" style="float:right"
                                @click="register()" :disabled="isLoading">
                                <span class="innerset">
                                    <span class="interface">登録</span>
                                    <span class="interface" v-if="isLoading">
                                        <i class="fa fa-spinner fa-spin"></i>
                                    </span>
                                    <span class="interface" v-if="!isLoading">
                                        <i class="fa fa-arrow-right"></i>
                                    </span>
                                </span>
                            </button>
                            <a href="{{route('thanks.page')}}" id="redirectToThanksPage" class="d-none">
                            </a>
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
                        store: @json( route( 'company.store')),
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
                isDisabled : true,
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

            vm.companies.name = @json($name ?? '');
            vm.companies.name_kana = @json($name_kana ?? '');
            vm.companies.agent_license_name = @json($agent_license_name ?? '');
            vm.companies.agent_license_renewals = @json($agent_license_renewals ?? '');
            vm.companies.agent_license_number = @json($agent_license_number ?? '');
            vm.companies.reason = @json($reason ?? '');

            vm.users.display_name = @json($display_name ?? '');

            vm.companies.post_code = @json($postcode ?? '');
            vm.companies.prefecture = @json($prefecture ?? '');
            vm.companies.city = @json($city ?? '');
            vm.companies.area_number = @json($area_number ?? '');
            vm.companies.name_building = @json($name_building ?? '');
            vm.companies.phone = @json($phone ?? '');
            vm.companies.fax = @json($fax ?? '');
            vm.companies.email = @json($email ?? '');
            vm.companies.url = @json($url ?? '');
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
            backButton: function(){
                this.$refs.registerForm.submit();
            },
            register: function(){
                // ----------------------------------------------------------
                let vm = this;
                // ----------------------------------------------------------
                //set loading state
                vm.$store.commit( 'setLoading', true );

                //declare variable
                var state       = vm.$store.state;
                var formData    = new FormData();
                var url         = state.preset.api.store;

                //append all companies data
                for (let key of Object.keys(vm.companies)) {
                    formData.append(`companies[${key}]`, vm.companies[key]);
                }

                //append all users data
                for (let key of Object.keys(vm.users)) {
                    formData.append(`users[${key}]`, vm.users[key]);
                }

                //sent axios post with form data
                var options = { headers: { 'Content-Type': 'multipart/form-data' }};
                var result = axios.post( url, formData, options )
                .then((response) => {
                    if( response.data ){
                        if( response.data.status == "success"){
                            var message = '私は入力したものを保存しました、メールをご確認ください';
                            vm.$toasted.show( message, { type: 'success' });
                            vm.$store.commit( 'setLoading', false );
                            this.redirectPage();
                        }else{
                            //validation failed
                            var message = 'メールの送信に失敗しました';
                            vm.$toasted.show( message, { type: 'error' });
                            vm.$store.commit( 'setLoading', false );
                        }
                    }
                }).catch((err) => {
                    var message = '何か問題がある場合は、もう一度お試しください';
                    vm.$toasted.show( message, { type: 'error' });
                    vm.$store.commit( 'setLoading', false );
                })

            },
            redirectPage: function(){
                let btn = document.getElementById("redirectToThanksPage");
                console.log(btn);
                btn.click();
            }

            // -----------------------------------------------------------------
        }
        // ---------------------------------------------------------------------
    }
    // -------------------------------------------------------------------------
</script>
@endpush
