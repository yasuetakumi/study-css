<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-K7994SH');</script>
    <!-- End Google Tag Manager -->
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
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K7994SH"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Header -->
    <div x-data="{ scrollAtTop: true }">
        <header class="header navbar navbar-expand-lg navbar-top header-border-top fixed-top box-shadow" id="navbarMenu"
                :class="{ 'bg-nav-scroll': !scrollAtTop }" @scroll.window="scrollAtTop = (window.pageYOffset > 50) ? false : true">
            <div class="container-fluid mx-lg-64 mx-md-4">
                <div class="row w-100 justify-content-between align-items-center mx-lg-32">
                        <div>
                            <a class="navbar-brand pl-3 pt-0 mr-0" href="{{route('lp.partner')}}">
                                <img class="img-logo h-auto mt-0 navbar-logo-mobile" src="{{asset('assets/img/logo.png')}}" alt="Taberuba Logo">
                            </a>
                        </div>

                        <div class="collapse navbar-collapse pr-3 col-md-9" id="navbarNav0">
                            <ul class="navbar-nav ml-auto align-items-center" :class="{ 'nav-text': !scrollAtTop }">
                                <div class="header-mt d-flex fw-bold">
                                    <li class="nav-item">
                                        <a href="#">閲覧履歴</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">お気に入り</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">物件掲載希望の方はこちら</a>
                                    </li>
                                </div>
                                <li class="nav-item">
                                    <a class="btn btn-secondary revert btn-top" href="#">会員登録／ログイン</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-secondary revert btn-top" href="#">
                                        お問い合わせはこちら
                                    </a>
                                </li>
                            </ul>
                        </div>

                </div>
            </div>
        </header>

        <div class="breadcrumb-wrap is-breadcrumb mt-5 mb-2">
            <div class="container">
                <div class="row interset">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <a href="">トップページ</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a>よくあるご質問</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- <header id="header">
            <div class="nav-sp container">
                <nav class="row">
                    <div class="col-5 col-sm-8 col-md-3 text-left col-logo">
                        <h1><a class="navbar-brand pl-3 pt-0 mr-0" href="{{route('lp.partner')}}">
                            <img class="img-logo h-auto mt-0 navbar-logo-mobile" src="{{asset('assets/img/logo.png')}}" alt="Taberuba Logo">
                        </a></h1>
                    </div>
                    <div class="col-7 col-sm-4 sp-only wrapp-btn-sp">
                        <div id="menu-bar" class="navbar-toggler">
                            <div class="navbar-toggler-icon"><span></span><span></span><span></span></div>
                        </div>
                    </div>
                    <div id="navbarNav0" class="col-md-9">
                        <ul class="navbar-nav justify-content-end">
                            <li class="nav-item ">
                                <a class="nav-link" href="https://tsubotan.net/service">サービスについて</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="https://tsubotan.net/faq">よくあるご質問</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="https://tsubotan.net/gallery">実績</a>
                            </li>

                            <li class="nav-item d-block d-md-none ">
                                <a class="nav-link" href="https://tsubotan.net/contractor-application">協力業者募集</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="https://tsubotan.net/smoking-space">喫煙ブース設置</a>
                            </li>
                            <li class="nav-item d-block d-md-none ">
                                <a class="nav-link" href="https://tsubotan.net/utilities">お役立ち情報</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header> --}}
    </div>

    <!-- End -->
    <!-- header -->
    @yield('content')
    <!-- vue init -->
    <footer class="footer bg-footer p-3 text-center w-100">
        <div class="container">
            <div class="row align-items-top text-center text-md-left">
                <div class="col-12 col-sm-12 col-md-12 col-logo">
                    <a class="navbar-brand pl-3 pt-0 mr-0" href="{{route('lp.partner')}}">
                        <img class="img-logo h-auto mt-0 navbar-logo-mobile" src="{{asset('assets/img/logo.png')}}" alt="Taberuba Logo">
                    </a>
                </div>
                <div class="col-12 col-md-8 col-footer-menu pc-only">
                    <ul class="nav nav-footer-left justify-content-start nav-bold">
                        <li class="nav-item">
                            <a class="nav-link" href="#">運営会社</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">よくあるご質問</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">プライバシーポリシー</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">利用規約</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">お問い合わせ</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="text-right to-top">
                <a class="btn btn-dark rounded-pill t-top" href="#top">
                    <i class="fa fa-angle-up">
                    </i>
                </a>
            </div>
        </div>
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
