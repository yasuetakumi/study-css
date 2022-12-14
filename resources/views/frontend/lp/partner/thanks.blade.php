@extends('frontend.lp.layouts.app-partner')
@section('title', 'お問い合わせ受付完了 | たべるば')

@section('description', 'たべるばのお問い合わせ完了ページです。')

@section('content')
<div class="content-thanks flex-grow-1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="content">
                    <p class="title">お問い合わせ<br class="d-block d-lg-none">ありがとうございます。</p>
                    <p class="subtitle">いただいたお問い合わせは数営業日以内にご返信いたします。<br>
                    今しばらくお待ちくださいますようお願いいたします。</p>
                    <a href="{{route('lp.partner')}}" class="btn btn-secondary btn-thanks border-0">
                        トップページへ戻る
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
