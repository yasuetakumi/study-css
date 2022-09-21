@php
    $isAdminLogin = false;
    $isCompanyLogin = false;
    if(Auth::guard('user')->check()){
        $isCompanyLogin = true;
    } else if(Auth::check()) {
        $isAdminLogin = true;
    }
@endphp
@extends('backend._base.content_datatables')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        @if($isAdminLogin)
            <li class="breadcrumb-item"><a href="{{route('admin.property.index')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        @else
            <li class="breadcrumb-item"><a href="{{route('company.property.index')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        @endif
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('top_buttons')
    @if (Auth::guard('user')->check())
        <a href="{{route('company.property.create')}}" class="btn btn-secondary">@lang(('label.createNew'))</a>
    @else
        <a href="{{route('admin.property.create')}}" class="btn btn-secondary">@lang(('label.createNew'))</a>
    @endif
@endsection

@section('actions')
    <div class="d-flex align-items-center justify-content-end">
        <form id="formSubmitCsv" method="POST" action="{{route('admin.property.import')}}" enctype="multipart/form-data">
            @csrf
            <a class="text-link fs-16 mr-2" target="_blank" download href="{{asset('csv/property_template.csv')}}">テンプレートファイルをダウンロード</a>
            <input id="input-file" type="file" name="file" accept=".csv" class="d-none" ref="fileInput" v-on:change="onFilePicked">
            <button id="trigger-btn" type="button" class="btn btn-outline-secondary mr-2" @click="onPickFile">CSVファイルを選択</button>
            <button id="submit-btn" type="submit" class="btn btn-success">
                保存
            </button>
            <span class="d-block text-right fs-16 mt-2" v-if="name">
                ファイル名 : @{{name}}
            </span>
        </form>
    </div>
@endsection

@section('content')
    @if(Request::is('admin/*'))
        <th data-col="user.company.id">@lang('label.company_id')</th>
        <th data-col="user.company.company_name">@lang('label.company_name')</th>
    @endif
    <th data-col="id">@lang('label.property_id')</th>
    <th data-col="user.display_name">@if(Request::is('company/*'))@lang('label.administrator') @else @lang('label.in_charge_name') @endif </th>
    <th data-col="postcode.postcode">@lang('label.postcode')</th>
    <th data-col="prefecture_city_location">@lang('label.address')</th>
    <th data-col="man">@lang('label.rent_amount')</th>
    <th data-col="tsubo">@lang('label.surface_area')</th>
    <th data-col="updated_at" class="no-sort" data-filter="false">@lang('label.updated_at_datetime')</th>
    <th data-col="created_at" class="no-sort" data-filter="false">@lang('label.created_at_datetime')</th>
    <th data-col="action">@lang('label.action')</th>
@endsection

@push('scripts')
    <script>
        $( document ).ready(function() {
            // disable button while submit
            $('#formSubmitCsv').submit(function() {
                $('#trigger-btn').attr('disabled', true);
                $('#submit-btn').attr('disabled', true);
            });
        });
    </script>
@endpush

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
                name: null,
                file: null,
                data: null,
                is_load : null,
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

        /*
        ## ------------------------------------------------------------------
        ## VUE METHOD
        ## function associated with the vue instance
        ## ------------------------------------------------------------------
        */
        methods: {
            // --------------------------------------------------------------
            onPickFile() {
                this.$refs.fileInput.click();
            },
            onFilePicked(event) {
                const files = event.target.files;
                let filename = files[0].name;
                this.name = filename;
                let extention = filename.split(".");

                if ('csv' === extention[extention.length - 1]) {
                    this.file = files[0];
                } else {
                    console.log("csv only")
                }
            },

        }
    }
</script>
@endpush


