<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $page_title }} | {{ config('app.name') }}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <!-- DataTables Button -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    {{--multi select--}}
    <link href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/backend/adminlte/adminlte.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{--custom css--}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{AssetHelper::version('css/backend/backend-custom.css')}}">

    <style>
        .parsley-errors-list{
            list-style-type: none;
        }
        .errorBlock{
            color: red;
            font-size: 11px;
        }
        .errorBlock ul{
            padding: 0;
            margin: 0;
        }
        .modal { overflow: auto !important; }
        .modal-backdrop {
            z-index : 0;
        }
    </style>
    @stack('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

    <!-- Navbar -->
    @auth
        @if (\Request::is('admin/*') || \Request::is('company/*'))
        <nav class="main-header navbar navbar-expand navbar-light navbar-info">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto rightNavbar">
                <!-- Select language -->
                @if(config('app.debug'))
                <li class="nav-item dropdown dropdown-lang">
                    <a class="nav-link" data-toggle="dropdown" href="#" style="display: flex;">
                        <?php
                            $lang = 'img/backend/jp.png';
                            if(App::isLocale('en')){
                                $lang = 'img/backend/en.png';
                            }
                        ?>
                        <i class="fa fa-language" style="font-size: 24px; margin-top: -0.1rem; margin-right: 3px"></i>
                        <span class="span-locale">@lang('label.language')</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                        <a href="{{ route('setlanguage', ['language' => 'en']) }}" class="dropdown-item">
                            <img src="{{ asset("img/backend/en.png") }}" class="img-lang mr-2" id="set-english" /> English
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('setlanguage', ['language' => 'ja']) }}" class="dropdown-item">
                            <img src="{{ asset("img/backend/jp.png") }}" class="img-lang mr-2" id="set-japanese" /> 日本語
                        </a>
                        <div style="position: fixed; background-color: #ffff88; color:#ee4400; margin-top:10px;">
                            [DEV NOTE]Because language switching is prepared for only development, It display when APP_DEBUG=TRUE. <br>
                            If you need to change spec, check "Middleware/MultiLanguage.php"
                        </div>
                    </div>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}" target="_blank"><i class="fa fa-home" aria-hidden="true"></i>
                    @lang('label.top_page')</a>
                </li>
                <li>
                    <?php
                        if(Auth::guard('user')->check()){
                            $logout = 'logout';
                        } else {
                            $logout = 'admin.logout';
                        }
                    ?>
                    <a class="nav-link" id="admin-logout" href="{{ route($logout) }}"><span><i class="fas fa-sign-out-alt"></i> @lang('label.logout')</span></a>
                </li>
            </ul>

        </nav>
        @endif

    @else
    <!-- navbar for frontend user C-COMMON-1 -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #446eb8;">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- C-1-1 -->
                <li class="nav-item border-right">
                    <a class="nav-link text-light" href="{{ route('property.index') }}"><span class="fas fa-search"> 店舗物件を探す</span></a>
                </li>
                <!-- C-1-2 -->
                <li class="nav-item border-right">
                    <search-condition-list @getindex="" isbutton="false" label="希望にマッチした物件"></search-condition-list>
                </li>
                <!-- C-1-3 -->
                <!--<li class="nav-item dropdown border-right">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    駅か市で探す
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>-->
                <!-- C-1-4 -->
                <li class="nav-item border-right">
                    <a class="nav-link text-light" href="{{ route('property.history', ['favorite' => true ]) }}">お気に入り</a>
                </li>
            </ul>
        </div>
    </nav>
    @endauth
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
@auth
    @if (\Request::is('admin/*') || \Request::is('company/*'))
        @include('backend._base.nav_left')
    @endif
@endauth
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper {{ Request::is('admin/*') || Request::is('company/*') ? '' : 'ml-0' }}">
        @yield('content-wrapper')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Right Sidebar -->
@auth
    @yield('control-right-sidebar')
@endauth
<!-- /.control-Right sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer text-sm {{ Request::is('admin/*') || Request::is('company/*') ? '' : 'ml-0' }}">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Version 1
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; <span id="spanYear"></span> <a href="https://grune.co.jp">Grune</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->


<!-- REQUIRED SCRIPTS -->
<!-- vue init -->
<script src="{{asset('js/manifest.js')}}"></script>
<script src="{{asset('js/vendor.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
@include('frontend._components.search_condition_list')
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
{{-- <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> --}}
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
{{--multiselect--}}
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/backend/adminlte/adminlte.min.js')}}"></script>
<!-- custom backend -->
<script src="{{AssetHelper::version('js/backend/backend.js')}}"></script>

{{--custom js--}}
@stack('scripts')
<script>
    $(function () {
        @if ($message = Session::get('success'))
        toastr.success('{{ $message }}');
        @endif
        @if ($errors->any())
        toastr.error('@foreach ($errors->all() as $error)' +
            '<p>{{ $error }}</p>' +
            '@endforeach');
        @endif
    });

    $(function () {
        $('#spanYear').html(new Date().getFullYear());
    });

     // ----------------------------------------------------------------
    // Check parsley on select2 and add mb-4
    // ----------------------------------------------------------------
    function checkSelect2Class(value){
        if(value== "" || value== undefined){
            value = "mb-4";
        }
        $('.clearfix').each(function(){
            if($(this).find(".parsley-errors-list").html() !== "" && $(this).find(".parsley-errors-list").html() !== undefined){
                $(this).addClass(value);
                $(this).find(".select2-selection").addClass('select2-is-invalid');
            }else{
                $(this).removeClass(value);
                $(this).find(".select2-selection").removeClass('select2-is-invalid');
            }

        });
    }
    // ----------------------------------------------------------------
</script>

<script>
    let mixin = {};
    let strore = null;
</script>

@stack('vue-scripts')
<script src="{{asset('js/vue.js')}}"></script>

</body>
</html>
