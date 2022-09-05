<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    {{-- <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{--custom css--}}
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <!-- Alpine Plugins -->
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>

    <!-- Alpine Core -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body>
    <!-- Header -->
    <div x-data="{ scrollAtTop: true }">
        <header class="navbar navbar-expand-lg navbar-top header-border-top fixed-top" id="navbarMenu"
                :class="{ 'bg-nav-scroll': !scrollAtTop }" @scroll.window="scrollAtTop = (window.pageYOffset > 50) ? false : true">
            <div class="container-fluid mx-lg-64">
                <div class="row w-100 justify-content-between align-items-center" style="width: 104%">
                    <div>
                        <a class="navbar-brand ml-3 pt-0 mr-0" href="#">
                            <img class="img-logo h-auto mt-0 navbar-logo-mobile" src="{{asset('assets/img/logo.png')}}" alt="Taberuba Logo">
                        </a>
                    </div>
                    <div class="d-lg-none d-flex menu-btn-sp">
                        <a class="btn btn-secondary d-flex align-items-center h-auto py-1 px-2 mr-2 fs-14" href="#">お問い合わせ</a>
                        <a class="btn btn-secondary d-flex align-items-center h-auto py-1 px-2 fs-14" href="#">
                            <span><img src="{{asset('assets/img/icon-phone-white.png')}}" alt=""></span>
                            050-5807-2335</a>
                        {{-- <a x-show="!mobileNav" role="button"
                            x-on:click="mobileNav = !mobileNav">
                            <i class="fas fa-bars fa-2x mt-2" :class="{'animate__animated animate__rotateOut' : mobileNav}"></i>
                        </a>
                        <a x-show="mobileNav" role="button"
                            x-on:click="mobileNav = !mobileNav">
                            <i class="fas fa-times fa-2x mt-2" :class="{'animate__animated animate__rotateIn' : mobileNav}"></i>
                        </a> --}}
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNav0">
                        <ul class="navbar-nav ml-auto align-items-center">
                            <li class="nav-item">
                                <a class="btn btn-secondary" href="#">お問い合わせ</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-secondary d-flex align-items-center" href="#">
                                    <span><img src="{{asset('assets/img/icon-phone-white.png')}}" alt=""></span>
                                    050-5807-2335</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-- End -->
    <!-- header -->
    @yield('content')
    <!-- vue init -->
    <footer class="bg-black p-3 text-center w-100">
       <div class="text-white fs-14">&copy; 2022 RealEstateMedia inc.</div>
    </footer>
    <script src="{{asset('js/manifest.js')}}"></script>
    <script src="{{asset('js/vendor.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    {{-- <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> --}}
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
