<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{--custom css--}}
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('assets/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/banner.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/contents.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/elements.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/css/footer.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/css/header.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/css/item-list.css')}}"> --}}
</head>
<body>
    <!-- Header -->
    <header class="navbar navbar-expand-lg navbar-top header-border-top" id="navbarMenu">
        <div class="container-full">
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <a class="navbar-brand" href="#">
                        <img class="img-logo" src="{{asset('assets/img/logo.png')}}" alt="Taberuba Logo">
                    </a>
                </div>
                <div class="col-auto">
                    <div class="row">
                        <div class="col-12">
                            <div class="collapse navbar-collapse" id="navbarNav0">
                                <ul class="navbar-nav ml-auto align-items-center">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">たべるばとは</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">不動産業者様向け</a>
                                    </li>
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
                </div>

                {{-- <div class="col-6 col-lg-10">
                    <div class="row">
                        <div class="col-12 mb-3 text-right">
                            <div class="row justify-content-end">
                                <div class="col-12 col-md-6 col-lg-auto d-flex align-items-center">
                                    <a href="tel:0244-23-1022">
                                        <div class="top-contact-info mt-1">
                                            <div class="phone-wrap">
                                                <i class="phone-icon fa fa-phone"></i>
                                            </div>

                                            <div class="phone-text">
                                                <p class="text-info ff-base-heading line-height fs-24">0244-23-1022</p>
                                            </div>
                                            <p class="text-info fs-13">平日9：00～18：00</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-12 col-md-6 col-lg-auto mt-1">
                                    <div class="d-block">
                                        <a href="#" class="btn btn-top-nav d-lg-block d-none">お問い合わせ/資料ダウンロード</a>
                                        <a href="#" class="btn btn-top-nav d-block d-lg-none">お問い合わせ<br>資料ダウンロード</a>
                                    </div>

                                    <div id="toggleNav" class="toggler-icon">
                                        <div class="icon-bar1"></div>
                                        <div class="icon-bar2"></div>
                                        <div class="icon-bar3"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-auto mt-1">
                                    <div class="d-block">
                                        <a href="#" class="btn btn-top-nav w-auto d-lg-block d-none">ZOOM相談会</a>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-auto mt-1">
                                    <div class="d-block">
                                        <a href="#" class="btn btn-top-nav w-auto d-lg-block d-none">代理店様募集</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </header>
    <!-- End -->
    <!-- header -->
    @yield('content')
<!-- vue init -->
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
