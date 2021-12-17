@extends('backend._base.content_form')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('top_buttons')
    @if ($page_type == "create")
        <a href="{{route('admin.news.index')}}" class="btn btn-secondary float-sm-right">@lang('label.list')</a>
    @else
        <a href="{{route('admin.news.create')}}" class="btn btn-secondary float-sm-right">@lang('label.createNew')</a>
        <a href="{{route('admin.news.index')}}" class="btn btn-secondary float-sm-right">@lang('label.list')</a>
    @endif
@endsection

@section('content')
    @component('backend._components.form_container', ["action" => $form_action, 'id' => 'news-form',  "page_type" => $page_type, "files" => true])
        @component('backend._components.input_text', ['name' => 'title', 'label' => __('label.title'), 'required' => 1, 'value' => $item->title]) @endcomponent
        <!-- @component('backend._components.input_select_ajax',[
            'name'              => 'company_id',
            'options'           => [empty($item->company->company_name) ? '' : $item->company->company_name],
            'label'             => __('label.company'),
            'required'          => 0,
            'url'               => route('admin.news.show', 'searchcompany'),
            'value'             => $item->company_id])
        @endcomponent -->

        @component('backend._components.vue.form.select2', [
            'name'          => 'company_id',
            'label'         => __('label.company'),
            'required'      => 'false',
            'options'       => '$store.state.preset.company_options',
            'model'         => 'items.company_id',
        ])
        @endcomponent

        @component('backend._components.input_image', ['name' => 'image', 'label' => __('label.image'), 'required' => 0, 'value' => $item->image]) @endcomponent
        @component('backend._components.input_file', ['name' => 'pdf_file', 'label' => __('label.pdf_file'), 'required' => 0, 'value' => $item->pdf_file, 'accept' => '.pdf']) @endcomponent
        @component('backend._components.input_text_editor', ['name' => 'body', 'label' => __('label.body'), 'required' => 1, 'value' => $item->body]) @endcomponent
        @component('backend._components.input_date_picker', ['name' => 'publish_date', 'label' => __('label.publish_date'), 'required' => 1, 'value' => $item->publish_date]) @endcomponent
        @component('backend._components.input_radio', ['name' => 'status', 'options' => ['draft', 'publish'], 'label' => __('label.status'), 'required' => 1, 'value' => $item->status]) @endcomponent

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
                    company_options: @json($company_options)
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
                    company_id: null,
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
            if(@json($page_type) == 'edit'){
                var item = @json($item);
                this.items.company_id = item.company_id;
            }
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
                        var $form = $('#news-form');
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
