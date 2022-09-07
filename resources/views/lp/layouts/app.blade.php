<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="「たべるば」は掲載料無料！成約手数料無料！業界初の内装工事成約で紹介料を支給！を行う新しい不動産ポータルサイトです。「たべるば」に掲載する飲食店向けの物件を大募集しています。">
    <title>たべるば | 飲食店向けの物件大募集！ | 「飲食店物件専門」の不動産ポータルサイト！</title>
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
    <style>
        ul.parsley-errors-list li.parsley-type{
            display: block !important;
        }
    </style>

</head>
<body>
    <!-- Header -->
    <div x-data="{ scrollAtTop: true }">
        <header class="navbar navbar-expand-lg navbar-top header-border-top fixed-top" id="navbarMenu"
                :class="{ 'bg-nav-scroll': !scrollAtTop }" @scroll.window="scrollAtTop = (window.pageYOffset > 50) ? false : true">
            <div class="container-fluid mx-lg-64 mx-md-4">
                <div class="row w-100 justify-content-between align-items-center mx-lg-32">
                    <div>
                        <a class="navbar-brand pl-3 pt-0 mr-0" href="#">
                            <img class="img-logo h-auto mt-0 navbar-logo-mobile" src="{{asset('assets/img/logo.png')}}" alt="Taberuba Logo">
                        </a>
                    </div>
                    <div class="d-lg-none d-flex menu-btn-sp">
                        <a class="btn btn-secondary revert d-flex align-items-center h-auto py-1 px-2 mr-2 fs-12" href="#contact">お問い合わせ</a>
                        <a class="btn btn-secondary revert d-flex align-items-center h-auto py-1 px-2 fs-12 icon-phone" href="tel:05058072335">
                            {{-- <span class="icon"></span> --}}
                            {{-- <img class="pr-1" src="{{asset('assets/img/icon-phone-white.png')}}" alt=""> --}}
                            {{-- <img class="pr-1" src="{{asset('assets/img/icon-phone-green.png')}}" alt=""> --}}
                            050-5807-2335
                        </a>
                    </div>
                    <div class="collapse navbar-collapse pr-3" id="navbarNav0" >
                        <ul class="navbar-nav ml-auto align-items-center">
                            <li class="nav-item">
                                <a class="btn btn-secondary revert" href="#contact">お問い合わせ</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-secondary revert d-flex align-items-center icon-phone" href="tel:05058072335">
                                    {{-- <span class="icon"></span> --}}
                                    {{-- <img class="pr-1" src="{{asset('assets/img/icon-phone-white.png')}}" alt=""> --}}
                                    {{-- <img class="pr-1" src="{{asset('assets/img/icon-phone-green.png')}}" alt=""> --}}
                                    050-5807-2335
                                </a>
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
       <div class="text-white fs-14">&copy; 2022 Taberuba inc.</div>
    </footer>
    <script src="{{asset('js/manifest.js')}}"></script>
    <script src="{{asset('js/vendor.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    {{-- <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> --}}
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script>
        function validate(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
            // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]/;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>
    @stack('scripts')
</body>
</html>
