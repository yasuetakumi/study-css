@extends('backend._base.content_form')

@section('content')
    @component('backend._components.form_container', ["action" => $form_action, "page_type" => $page_type, "files" => false])
        @component('backend._components.input_text', ['name' => 'company_name', 'label' => __('label.company_name'), 'required' => 0, 'value' => $item->company_name ?? '']) @endcomponent
        @component('backend._components.input_text', ['name' => 'name', 'label' => __('label.name'), 'required' => 1, 'value' => $item->name ?? '']) @endcomponent
        @component('backend._components.input_text', ['name' => 'name_kana', 'label' => __('label.name_kana'), 'required' => 0, 'value' => $item->name_kana ?? '', 'onlykatana' => true]) @endcomponent
        @component('backend._components.input_phone_number', ['name' => 'phone_number', 'label' => __('label.phone'), 'required' => 0, 'value' => $item->phone_number ?? '']) @endcomponent
        @component('backend._components.input_email', ['name' => 'email', 'label' => __('label.email'), 'required' => 1, 'value' => $item->email ?? '']) @endcomponent

        @component('backend._components.text_label', ['name' => 'line_linkage_status', 'label' => __('label.line_linkage_status'), 'value' => $item->line_id == null ? '未連携' : '連携', 'required' => false]) @endcomponent
        @component('backend._components.text_label', ['name' => 'line_qr_or_link', 'label' => __('label.line_qr_or_link'), 'required' => false])
                <div class="d-inline-flex flex-column justify-content-center">
                    <img style="width: 200px" src="https://qr-official.line.me/sid/L/136wxwhz.png?shortenUrl=true">
                    <a class="text-center" href="https://line.me/R/ti/p/@136wxwhz">https://line.me/R/ti/p/@136wxwhz</a>
                </div>
            @endcomponent

        @component('backend._components.input_password') @endcomponent

        @component('backend._components.input_radio', ['is_indexed_value' => true, 'indexStartFrom0' => true, 'options' => $notif_statuses, 'name' => 'is_line_notification_enabled', 'label' => __('label.line_notif_settings'), 'value' => $item->is_line_notification_enabled ?? 1, 'required' => false])
        @endcomponent
        @component('backend._components.input_radio', ['is_indexed_value' => true, 'indexStartFrom0' => true, 'options' => $notif_statuses, 'name' => 'is_email_notification_enabled', 'label' => __('label.email_notif_settings'), 'value' => $item->is_email_notification_enabled ?? 1, 'required' => false])
        @endcomponent

        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="term" name="privacy">
                    <label class="form-check-label" for="term"><a class="text-link" target="_blank" href="{{route('terms-of-use')}}">@lang('label.term_of_use')</a></label>
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="privacy" name="policy">
                    <label class="form-check-label" for="privacy"><a class="text-link" target="_blank" href="{{route('privacy-policy')}}">@lang('label.privacy_policy')</a></label>
                </div>
            </div>
        </div>

        @component('backend._components.input_buttons', ['page_type' => $page_type])@endcomponent
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

            // --------------------------------------------------------------
        }
    }
</script>
@endpush
