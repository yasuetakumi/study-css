@extends('backend._base.content_form')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('content')
    @component('backend._components.form_container', ["action" => $form_action, 'id' => 'feature-form', "page_type" => $page_type, "files" => true])

        {{-- input title --}}
        @component('backend._components.input_text', ['name' => 'title', 'label' => __('label.title'), 'required' => 1, 'value' => $item->title]) @endcomponent

        {{-- select company --}}
        @component('backend._components.input_select_ajax',[
            'name'              => 'company_id',
            'options'           => [empty($item->company->company_name) ? '' : $item->company->company_name],
            'label'             => __('label.company'),
            'required'          => 1,
            'url'               => route('admin.news.show', 'searchcompany'),
            'value'             => $item->company_id])
        @endcomponent

        @component('backend._components.vue.form.select2', [
            'name'          => 'company_id',
            'label'         => __('label.company'),
            'required'      => 'true',
            'options'       => '$store.state.preset.company_options',
            'model'         => 'items.company_id',
        ])
        @endcomponent

        {{-- input pdf file --}}
        @component('backend._components.input_file', ['name' => 'pdf_file', 'label' => __('label.pdf_file'), 'required' => 0, 'value' => $item->pdf_file, 'accept' => '.pdf']) @endcomponent

        {{-- input body --}}
        @component('backend._components.input_text_editor', ['name' => 'body', 'label' => __('label.body'), 'required' => 1, 'value' => $item->body]) @endcomponent

        {{-- input publish date --}}
        @component('backend._components.input_date_picker', ['name' => 'publish_date', 'label' => __('label.publish_date'), 'required' => 1, 'value' => $item->publish_date]) @endcomponent

        {{-- input radio --}}
        @component('backend._components.input_radio', ['name' => 'status', 'options' => ['draft', 'publish'], 'label' => __('label.status'), 'required' => 1, 'value' => $item->status]) @endcomponent

        {{-- input radius --}}
        @component('backend._components.input_decimal_ratio', ['name' => 'radius','label' => __('label.radius'),'required' => 0,'value' => $item->radius,'unit' => 'km','unit_ratio' => 'mile','multiply' => 0.621371])@endcomponent

        {{-- input image --}}
        @if ($page_type == "create")
            @for ($index_file = 1; $index_file <= 3; $index_file++)
                @component('backend._components.input_multi_images', [
                    'name'     => 'image'.$index_file,
                    'label'    => ($index_file == 1) ? __('label.image').'1 '.__('label.thumbnail') : __('label.image').$index_file,
                    'required' => ($index_file == 1) ? 1 : 0,
                    'value'    =>  null,
                    'index'     => $index_file
                ])
                @endcomponent
            @endfor
        @else
            @component('backend._components.input_multi_images', [
                'name'     => 'image1',
                'label'    => __('label.image').'1 '.__('label.thumbnail'),
                'required' =>  1,
                'value'    => ($item->image1) ? $item->image1 : null,
            ])
            @endcomponent
            @component('backend._components.input_multi_images', [
                'name'     => 'image2',
                'label'    => __('label.image').'2',
                'required' =>  0,
                'value'    => ($item->image2) ? $item->image2 : null,
            ])
            @endcomponent
            @component('backend._components.input_multi_images', [
                'name'     => 'image3',
                'label'    => __('label.image').'3',
                'required' =>  0,
                'value'    => ($item->image3) ? $item->image3 : null,
            ])
            @endcomponent
        @endif

        {{-- input video --}}
        @if ($page_type == "create")
            @for ($index_file = 1; $index_file <= 3; $index_file++)
                @component('backend._components.input_multi_videos', [
                    'name' => 'video'. $index_file,
                    'label' => ($index_file == 1) ? __('label.video').'1 '.__('label.thumbnail') : __('label.video').$index_file,
                    'required' => ($index_file == 1) ? 1 : 0,
                    'value' => null,
                ])
                @endcomponent
            @endfor
        @else
            @component('backend._components.input_multi_videos', [
                'name' => 'video1',
                'label' => __('label.video').'1 '.__('label.thumbnail'),
                'required' => 1,
                'value' => ($item->video1) ? $item->video1 : null,
            ])
            @endcomponent
            @component('backend._components.input_multi_videos', [
                'name' => 'video2',
                'label' => __('label.video').'2 ',
                'required' => 0,
                'value' => ($item->video2) ? $item->video2 : null,
            ])
            @endcomponent
            @component('backend._components.input_multi_videos', [
                'name' => 'video3',
                'label' => __('label.video').'3 ',
                'required' => 0,
                'value' => ($item->video3) ? $item->video3 : null,
            ])
            @endcomponent
        @endif

        {{-- input button --}}
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
                        var $form = $('#feature-form');
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
