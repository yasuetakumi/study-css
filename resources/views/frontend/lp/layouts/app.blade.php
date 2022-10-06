<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="title" content="@yield('title')">
    <meta name="description" content="@yield('description')">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="{{asset('og-taberuba.jpg')}}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{url()->current()}}">
    <meta property="twitter:title" content="@yield('title')">
    <meta property="twitter:description" content="@yield('description')">
    <meta property="twitter:image" content="{{asset('og-taberuba.jpg')}}">

    <link rel="icon" type="image/png" href="{{asset('favicon.png')}}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}?v={{ env('APP_VERSION', date('YmdHis'))}}">
    {{--custom css--}}
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}?v={{ env('APP_VERSION', date('YmdHis'))}}">

    <script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "Organization",
			"url": "{{route('lp.partner')}}",
			"logo": "{{asset('assets/img/logo.png')}}",
			"name" : "業界初のキャッシュバック制度がある【飲食店物件専門】の不動産ポータルサイトです。 | たべるば"
		}
	</script>

    <!-- Alpine Plugins -->
    <script defer src="https://unpkg.com/@alpinejs/focus@3.10.3/dist/cdn.min.js"></script>

    <!-- Alpine Core -->
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <style>
        ul.parsley-errors-list li.parsley-type{
            display: block !important;
        }
    </style>

</head>
<body class="d-flex flex-column min-100vh">
    {{-- Header --}}
    <div x-data="{ scrollAtTop: true }">
        <header class="header-app"  id="navbarMenu"
            :class="{ 'bg-nav-scroll': !scrollAtTop }"
            @scroll.window="scrollAtTop = (window.pageYOffset > 50) ? false : true">
            <div class="container px-xl-0">
                <div class="content">
                    <div class="content-logo">
                        <img class="img-logo" src="{{asset('assets/img/logo.png')}}" alt="Taberuba Logo">
                    </div>

                    <div class="content-menu">
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">閲覧履歴</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">お気に入り</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">物件掲載希望の方はこちら</a>
                            </li>
                        </ul>

                        <ul class="menu-list-sp">
                            <li class="menu-item">
                                <a href="#">
                                    <img src="{{asset('assets/img/menu/heart-icon.png')}}" alt="heart icon" class="icon">
                                    <span class="text">お気に入り</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#">
                                    <img src="{{asset('assets/img/menu/history-icon.png')}}" alt="heart icon" class="icon">
                                    <span class="text">閲覧履歴</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0)" id="openMenu">
                                    <div class="toggle-icon">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <span class="text">メニュー</span>
                                </a>
                            </li>
                        </ul>

                        <div class="button-wrapper">
                            <a class="btn btn-secondary revert" href="{{route('lp.partner') . '#contact'}}">お問い合わせ</a>
                            <a class="btn btn-secondary revert d-flex align-items-center icon-phone" href="tel:05058072335">
                                050-5807-2335
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </header>
        {{-- <header class="header navbar navbar-expand-lg navbar-top header-border-top fixed-top" id="navbarMenu"
                :class="{ 'bg-nav-scroll': !scrollAtTop }" @scroll.window="scrollAtTop = (window.pageYOffset > 50) ? false : true">
            <div class="container px-xl-0">
                <div class="w-100 d-flex justify-content-between align-items-center">
                    <div>
                        <a class="navbar-brand pl-3 pt-0 mr-0" href="{{route('lp.partner')}}">
                            <img class="img-logo h-auto mt-0 navbar-logo-mobile" src="{{asset('assets/img/logo.png')}}" alt="Taberuba Logo">
                        </a>
                    </div>
                    <div class="d-none d-lg-flex justify-content-between align-items-center" id="navbarNav0">
                        <ul class="navbar-menu">
                            <li class="menu-item">
                                <a href="#">閲覧履歴</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">お気に入り</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">物件掲載希望の方はこちら</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item mr-3">
                                <a class="btn btn-secondary revert" href="{{route('lp.partner') . '#contact'}}">お問い合わせ</a>
                            </li>
                            <li class="nav-item mr-0">
                                <a class="btn btn-secondary revert d-flex align-items-center icon-phone" href="tel:05058072335">
                                    050-5807-2335
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header> --}}
    </div>
    {{-- End Header --}}

    {{-- Content --}}
    @yield('content')
    {{-- End Content --}}

    {{-- Footer --}}
    <footer class="footer-app">
        <div class="container px-xl-0">
            <div class="content">
                <div class="row mx-xl-0">
                    <div class="col-12 px-xl-0">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-logo">

                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">運営会社</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">よくあるご質問</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">プライバシーポリシー</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">利用規約</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">お問い合わせ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="to-top">
            <a class="btn btn-to-top" href="#top">
                <i class="fa fa-angle-up">
                </i>
            </a>
        </div>
    </footer>
    {{-- End Footer --}}

    <!-- vue init -->
    <script src="{{asset('js/manifest.js')}}"></script>
    <script src="{{asset('js/vendor.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

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

        $('#openMenu').click(function () {
            let $this = $(this);
            let toggler = $this.find('.toggle-icon');

            toggler.toggleClass('open');
        });
    </script>
    @stack('scripts')
</body>
</html>
