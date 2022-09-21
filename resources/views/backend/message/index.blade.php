@extends('backend._base.content_form')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center">Send Message To User</h3>
            @component('backend._components.form_container', ["action" => $form_action, 'id' => 'chat-form',  "page_type" => $page_type, "files" => false])
                @component('backend._components.input_text', ['name' => 'message', 'label' => 'Message', 'required' => 1, 'value' => '']) @endcomponent
                {{-- @component('backend._components.input_text', ['name' => 'title', 'label' => __('label.title'), 'required' => 1, 'value' => '']) @endcomponent --}}
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-secondary" id="input-submit">
                        <i class="fas fa-save"></i> Broadcast Message
                    </button>
                </div>

            @endcomponent
        </div>

        <div class="col-md-6">
            <h3 class="text-center">Send Message To User</h3>
            @component('backend._components.form_container', ["action" => $form_action2, 'id' => 'chat-form',  "page_type" => $page_type, "files" => false])
                @component('backend._components.input_text', ['name' => 'message', 'label' => 'Message', 'required' => 1, 'value' => '']) @endcomponent
                {{-- @component('backend._components.input_text', ['name' => 'title', 'label' => __('label.title'), 'required' => 1, 'value' => '']) @endcomponent --}}
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-secondary" id="input-submit">
                        <i class="fas fa-save"></i> Broadcast Message
                    </button>
                </div>

            @endcomponent
        </div>


    </div>
    <div class="row mt-5">
        <div class="col-md-4">
            <button @click="getBotInformation" class="btn btn-secondary" id="input-submit">
                <i class="fas fa-save"></i> Get Bot Info
            </button>
            <p>Bot Info @{{items.botInformation}}</p>
            <ul v-if="items.botInformation">
                <li v-for="(value, name, index) in items.botInformation">@{{name}} : @{{value}}</li>
            </ul>
        </div>
    </div>


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
                    api: {
                        botInfo: @json( route('api.chat.bot.information') ),
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
                    message_broadcast: '',
                    message: '',
                    user_id: '',
                    botInformation: null,
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
                        var $form = $('#news-form');
                        $form.parsley().validate();
                        checkSelect2Class();
                    }
                }, 400);
            },

            getBotInformation: function()
            {
                axios.get(this.$store.state.preset.api.botInfo)
                .then(function (response) {
                    this.items.botInformation = response.data;
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            // --------------------------------------------------------------
        }
    }
</script>
@endpush
