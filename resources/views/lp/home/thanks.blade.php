@extends('lp.layouts.app')
@section('meta')
    <!-- Primary Meta Tags -->
    <title>お問い合わせ受付完了 | たべるば</title>
    <meta name="title" content="お問い合わせ受付完了 | たべるば">
    <meta name="description" content="たべるばのお問い合わせ完了ページです。">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:title" content="お問い合わせ受付完了 | たべるば">
    <meta property="og:description" content="たべるばのお問い合わせ完了ページです。">
    <meta property="og:image" content="{{asset('og-taberuba.jpg')}}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{url()->current()}}">
    <meta property="twitter:title" content="お問い合わせ受付完了 | たべるば">
    <meta property="twitter:description" content="たべるばのお問い合わせ完了ページです。">
    <meta property="twitter:image" content="{{asset('og-taberuba.jpg')}}">
@endsection
@section('content')
<div class="content-thanks flex-grow-1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="content">
                    <p class="title">お問い合わせ<br class="d-block d-lg-none">ありがとうございます。</p>
                    <p class="subtitle">いただいたお問い合わせは数営業日以内にご返信いたします。<br>
                    今しばらくお待ちくださいますようお願いいたします。</p>
                    <a href="{{route('lp.index')}}" class="btn btn-secondary btn-thanks border-0">
                        トップページへ戻る
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
