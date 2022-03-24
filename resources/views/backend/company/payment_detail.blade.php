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
    @component('backend._components.form_container', ["action" => $form_action, 'id' => 'company-payment', "page_type" => $page_type, "files" => false])
        @component('backend._components.text_label', ['label' => __('label.remaining_points'), 'name' => 'remaining_points', 'value' => $company->remaining_points, 'required' => 0]) @endcomponent
        @component('backend._components.input_select',['label' => __('label.subscription_plan'), 'options' => $subscription_plan, 'name' => 'subscription_plan_id', 'value' => $company->company_payment_detail->subscription_plan_id ?? '', 'required' => 1])@endcomponent
        @component('backend._components.input_number', ['label' => __('label.card_number'), 'value' => $company->company_payment_detail->card_number ?? '', 'name' => 'card_number', 'required' => 1])@endcomponent
        @component('backend._components.input_number', ['label' => __('label.security_number'), 'value' => $company->company_payment_detail->card_security_number ?? '', 'name' => 'card_security_number', 'required' => 0])@endcomponent
        @component('backend._components.input_text', ['label' => __('label.card_holder_name'), 'value' => $company->company_payment_detail->cardholder_name ?? '', 'name' => 'card_holder_name', 'required' => 1])@endcomponent
        @component('backend._components.input_text', ['label' => __('label.card_brand'), 'value' => $company->company_payment_detail->card_brand ?? '', 'name' => 'card_brand', 'required' => 1])@endcomponent
        @component('backend._components.input_select_date', ['label' => __('label.expiry_month'), 'options' => $months, 'name' => 'card_month_expire_at', 'required' => 1, 'value' => !empty($company_month_expire) ? $company_month_expire : '']) @endcomponent
        @component('backend._components.input_select_date', ['label' => __('label.expiry_year'), 'options' => $years, 'name' => 'card_year_expire_at', 'required' => 1, 'value' => !empty($company_year_expire) ? $company_year_expire : '']) @endcomponent

        @component('backend._components.text_label', ['label' => __('label.expiry_date_subscription'), 'name' => 'subscription_expires_at', 'value' => $company->company_payment_detail->subscription_expires_at ?? '', 'required' => 0]) @endcomponent
        @component('backend._components.text_label', ['label' => __('label.register_details'), 'name' => 'register_detail', 'value' => $company->company_payment_detail->updated_at ?? '', 'required' => 0]) @endcomponent
        @component('backend._components.text_label', ['label' => __('label.time_of_payment'), 'name'=> 'time_payment', 'value' => $company->company_payment_detail->created_at ?? '', 'required' => 0]) @endcomponent
        @component('backend._components.text_label', ['label' => __('label.time_of_updating'), 'name' => 'time_updating', 'value' => $company->company_payment_detail->updated_at ?? '', 'required' => 0]) @endcomponent
        @component('backend._components.input_buttons', ['page_type' => $page_type])@endcomponent
    @endcomponent
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

        created: function(){
        },

        /*
        ## ------------------------------------------------------------------
        ## VUE COMPUTED
        ## define a property with custom logic
        ## ------------------------------------------------------------------
        */
        computed: {

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
                        var $form = $('#company-payment');
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
