@extends('backend._base.content_form')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('top_buttons')
    @if(!$isApproval)
        @if ($page_type == "create")
            <a href="{{route('admin.company.index')}}" class="btn btn-secondary float-sm-right">@lang('label.list')</a>
        @else
            {{-- Create company : ONLY SHOW for super_admin or admin --}}
            @if(Auth::user()->has_permit_edit_company )
                <a href="{{route('admin.company.create')}}" class="btn btn-secondary float-sm-right">@lang('label.createNew')</a>
            @endif
            @if (Auth::user()->adminRole)
                <a href="{{route('admin.company.index')}}" class="btn btn-secondary float-sm-right">@lang('label.list')</a>
            @endif
        @endif
    @endif
@endsection

@section('content')
    @component('backend._components.form_container', ["action" => $form_action, "page_type" => $page_type, "files" => false])
        @component('backend._components.input_text', ['name' => 'company_name', 'label' => __('label.company_name'), 'required' => 1, 'value' => $item->company_name]) @endcomponent
        @component('backend._components.input_postcode', ['name' => 'post_code', 'label' => __('label.post_code'), 'required' => 1, 'value' => $item->post_code]) @endcomponent
        @component('backend._components.input_text', ['name' => 'address', 'label' => __('label.address'), 'required' => 1, 'value' => $item->address]) @endcomponent
        @component('backend._components.input_text', ['name' => 'phone', 'label' => __('label.phone'), 'required' => 1, 'value' => $item->phone]) @endcomponent
        @component('backend._components.input_radio', ['name' => 'status', 'options' => ['pending', 'active', 'block'], 'label' => __('label.status'), 'required' => 1, 'value' => $item->status]) @endcomponent

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
