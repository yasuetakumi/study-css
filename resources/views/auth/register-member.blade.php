@extends('backend._base.content_form')

@section('content')
    @component('backend._components.form_container', ["action" => $form_action, "page_type" => $page_type, "files" => false, 'id' => 'form-register-member', 'method' => $isConfirmPage ? 'GET' : 'POST'])
        @component('backend._components.input_text', ['name' => 'company_name', 'label' => __('label.company_name'), 'required' => 0, 'value' => $item['company_name'] ?? '', 'isReadOnly' => $isConfirmPage]) @endcomponent
        @component('backend._components.input_text', ['name' => 'name', 'label' => __('label.name'), 'required' => 1, 'value' => $item['name'] ?? '', 'isReadOnly' => $isConfirmPage]) @endcomponent
        @component('backend._components.input_text', ['name' => 'name_kana', 'label' => __('label.name_kana'), 'required' => 0, 'value' => $item['name_kana'] ?? '', 'onlykatana' => true, 'isReadOnly' => $isConfirmPage]) @endcomponent
        @component('backend._components.input_phone_number', ['name' => 'phone_number', 'label' => __('label.phone'), 'required' => 0, 'value' => $item['phone_number'] ?? '', 'isReadOnly' => $isConfirmPage]) @endcomponent
        @component('backend._components.input_email', ['name' => 'email', 'label' => __('label.email'), 'required' => 1, 'value' => $item['email'] ?? '', 'isReadOnly' => $isConfirmPage]) @endcomponent

        @if ($isConfirmPage)
        <div id="form-group--password" class="row form-group">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                <strong class="field-title">
                    {{__('label.password')}}
                    <i class="fa fa-exclamation-circle tooltip-img" data-toggle="tooltip" data-placement="right" title="@lang('label.choosePasswordLength')" style="font-size: 16px;"></i>
                </strong>

                <span class="label-attach required">@lang('label.required')</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                <p>{{$item['password'] ?? ''}}</p>
                <input type="hidden" value="{{$item['password']}}" name="password">
            </div>
        </div>
        @else
            @component('backend._components.input_password') @endcomponent
        @endif


        {{-- @component('backend._components.input_radio', ['is_indexed_value' => true, 'indexStartFrom0' => true, 'options' => $notif_statuses, 'name' => 'is_line_notification_enabled', 'label' => __('label.line_notif_settings'), 'value' => $item->is_line_notification_enabled ?? 1, 'required' => false])
        @endcomponent --}}
        @component('backend._components.input_radio', ['is_indexed_value' => true, 'indexStartFrom0' => true, 'options' => $notif_statuses, 'name' => 'is_email_notification_enabled', 'label' => __('label.email_notif_settings'),
                'value' => $item['is_email_notification_enabled'] ?? 1, 'required' => false, 'isDisabled' => $isConfirmPage])
        @endcomponent

        @if($isConfirmPage)
            <input type="hidden" value="{{$item['is_email_notification_enabled']}}" name="is_email_notification_enabled">
        @endif

        @if (!$isConfirmPage)
            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="term" name="terms" required
                        data-parsley-errors-container = "#errorBlock-terms"
                        data-parsley-required-message="@lang('validation.required', ['attribute' => __('label.term_of_use')])">
                        <label class="form-check-label" for="term"><a class="text-link" target="_blank" href="{{route('terms-of-use')}}">@lang('label.term_of_use')</a></label>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="privacy" name="policy" required
                        data-parsley-errors-container = "#errorBlock-policy"
                        data-parsley-required-message="@lang('validation.required', ['attribute' => __('label.privacy_policy')])">
                        <label class="form-check-label" for="privacy"><a class="text-link" target="_blank" href="{{route('privacy-policy')}}">@lang('label.privacy_policy')</a></label>
                    </div>
                </div>
            </div>
            <div class="text-center mb-3">
                <div id="errorBlock-terms" class="errorBlock"></div>
                <div id="errorBlock-policy" class="errorBlock"></div>
            </div>
        @endif


        @if($isConfirmPage)
        <div id="form-group--button" class="row form-group">
            <div class="col-6">
                <button type="submit" class="btn btn-secondary mr-2 border border-white" style="float:left"
                    :disabled="isLoading">
                    <span class="innerset">
                        <span class="interface" v-if="!isLoading">
                            <i class="fa fa-arrow-left"></i>
                        </span>
                        <span class="interface">戻る</span>
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
                <a href="{{route('member-login')}}" id="redirectToLoginPage" class="d-none"></a>
            </div>
        </div>
        @else
            @component('backend._components.input_button_custom', ['label' => __('label.to_confirmation_page')])@endcomponent
        @endif
    @endcomponent

@endsection

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
                status: {
                    mounted: false,
                    loading: false
                },
                // ----------------------------------------------------------

                // ----------------------------------------------------------
                // Preset data
                // ----------------------------------------------------------
                preset: {
                    api: {
                        store: @json( route( 'member-register-store' )),
                    }
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
        mutations: {
            setLoading: function(state, loading) {
                if (loading) loading = true;
                Vue.set(state.status, 'loading', !!loading);
            },
        }
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
                    company_name: @json( $item['company_name'] ?? null ),
                    name: @json( $item['name'] ?? null ),
                    name_kana: @json( $item['name_kana'] ?? null ),
                    phone_number: @json( $item['phone_number'] ?? null ),
                    email: @json( $item['email'] ?? null ),
                    password: @json( $item['password'] ?? null ),
                    is_email_notification_enabled: @json( $item['is_email_notification_enabled'] ?? 1 ),
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
        computed: {
            isLoading: function() {
                return this.$store.state.status.loading
            },
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
            register: async function(){
                // ----------------------------------------------------------
                let vm = this;
                // ----------------------------------------------------------
                //set loading state
                vm.$store.commit( 'setLoading', true );

                //declare variable
                var state       = vm.$store.state;
                var url         = state.preset.api.store;

                const response = await axios.post(url, {
                    company_name: vm.items.company_name,
                    name: vm.items.name,
                    name_kana: vm.items.name_kana,
                    phone_number: vm.items.phone_number,
                    email: vm.items.email,
                    password: vm.items.password,
                    is_email_notification_enabled: vm.items.is_email_notification_enabled,
                });
                if(response.data.status == 'success'){
                    // ------------------------------------------------------
                    // redirect to login page
                    // ------------------------------------------------------
                    var message = '私は入力したものを保存しました、メールをご確認ください';
                    vm.$toasted.show( message, { type: 'success' });
                    vm.$store.commit( 'setLoading', false );
                    setTimeout(() => {
                        document.getElementById('redirectToLoginPage').click();
                    }, 2000);
                    // ------------------------------------------------------
                }else{
                    // ------------------------------------------------------
                    var message = 'メールの送信に失敗しました';
                    vm.$toasted.show( message, { type: 'error' });
                    vm.$store.commit( 'setLoading', false );
                    // ------------------------------------------------------
                }

            },
            redirectPage: function(){
                let btn = document.getElementById("redirectToLoginPage");
                console.log(btn);
                btn.click();
            }
            // --------------------------------------------------------------
        }
    }
</script>
@endpush
