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
        <header class="header navbar navbar-expand-lg navbar-top header-border-top fixed-top" id="navbarMenu"
                :class="{ 'bg-nav-scroll': !scrollAtTop }" @scroll.window="scrollAtTop = (window.pageYOffset > 50) ? false : true">
            <div class="container-fluid mx-lg-64 mx-md-4">
                <div class="row w-100 justify-content-between align-items-center mx-lg-32">
                    <div>
                        <a class="navbar-brand pl-3 pt-0 mr-0" href="{{route('lp.partner')}}">
                            <img class="img-logo h-auto mt-0 navbar-logo-mobile" src="{{asset('assets/img/logo.png')}}" alt="Taberuba Logo">
                        </a>
                    </div>
                    <div class="d-lg-none d-flex menu-btn-sp">
                        <a class="btn btn-secondary revert d-flex align-items-center h-auto py-1 px-2 mr-2 fs-12" href="#contact">お問い合わせ</a>
                        <a class="btn btn-secondary revert d-flex align-items-center h-auto py-1 px-2 fs-12 icon-phone" href="tel:05058072335">
                            050-5807-2335
                        </a>
                    </div>
                    <div class="collapse navbar-collapse pr-3" id="navbarNav0" >
                        <ul class="navbar-nav ml-auto align-items-center">
                            <li class="nav-item">
                                <a class="btn btn-secondary revert" href="{{route('lp.partner') . '#contact'}}">お問い合わせ</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-secondary revert d-flex align-items-center icon-phone" href="tel:05058072335">
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
