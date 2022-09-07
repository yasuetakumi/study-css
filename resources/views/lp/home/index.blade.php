@extends('lp.layouts.app')
@section('content')
<!-- Banner -->
<div class="banner-wrapper">
    <div class="container-full">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="wrap-img">
                    <img class="img-banner lozad" src="{{asset('assets/img/banner.png')}}" alt="Top MV Banner">
                </div>

                <div class="row justify-content-center">
                    <div class="banner-caption mt-5">
                        <div class="col-12">
                            <div class="row justify-content-center m-0">
                                <div class="col-12 p-0">
                                    <div class="text-center">
                                        <p class="banner-sub-title">飲食店専門</p>
                                    </div>
                                    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
                                        <p class="banner-sub-title mb-0 mr-2">新しい不動産ポータルサイト</p>
                                        <span><img class="block" src="{{asset('assets/img/logo.png')}}" alt="Taberuba Logo"></span>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <div class="banner-desc">
                                                <h1 class="sub-heading font-weight-bold">飲食店向けの <span class="sub-main-heading d-block font-weight-bold">物件大募集!!</span></h1>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="position-relative col-lg-4 col-md-5 col-12 mb-4 mb-lg-0">
                                            <img class="w-100 px-2" src="{{asset('assets/img/frame-banner.png')}}" alt="">
                                            <div class="frame-banner">
                                                <p class="text-banner">掲載料<span>無料</span></p>
                                            </div>
                                        </div>

                                        <div class="position-relative col-lg-4 col-md-5 col-12">
                                            <img class="w-100 px-2" src="{{asset('assets/img/frame-banner.png')}}" alt="">
                                            <div class="frame-banner">
                                                <p class="text-banner">成約手数料<span>無料</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center wrapper-btn-contact">
                                        <div class="col-lg-5 col-md-8 col-12">
                                            <a href="#contact" class="btn btn-secondary d-flex align-items-center justify-content-center text-center btn-about rounded-pill btn-contact-form">
                                                <img class="align-self-center mx-2 icon-logo img-logo" src="{{asset('assets/img/logo-white.svg')}}" alt="Taberuba Logo">掲載お問合せはコチラ【無料】
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End -->

<div class="section-top price-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="price-top">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">
                            <div class="page-header position-relative">
                                <div class="top-brand-logo d-none d-lg-block">
                                    <img src="{{asset('assets/img/top-brand.svg')}}" alt="内装工事成約で 紹介料3%を支給!!">
                                </div>
                                <p class="heading-title text-uppercase">REFERRAL FEE</p>
                                <h2 class="sub-title ff-base font-weight-bold">内装工事成約で <br class="d-lg-none"> <span style="color: #FE2020">紹介料</span>を支給!!</h2>
                            </div>
                            <img class="d-inline-block d-lg-none pt-5" src="{{asset('assets/img/top-brand.svg')}}" alt="内装工事成約で 紹介料3%を支給!!">

                        </div>
                        <div class="col-12">
                            <div class="page-body pb-0">
                                <div class="desc-content">
                                    <p class="title-desc ff-base">内装工事費用の一部を受け取れます。<br class="d-lg-none">※紹介料に関しては応相談可（3％～）</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="section-wrapper pt-0">
	<div class="content-payment">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="top-content">
                        <div class="row justify-content-center">
                            <div class="col-12 position-relative">
                                <img class="w-100" src="{{asset('assets/img/frame-yen.png')}}" alt="">
<div class="frame-payment">
    <p class="text-payment">例えば2,000万円の内装工事が成約した場合…</p>
    <p class="text-sub-payment d-inline-flex align-items-center">
        <img class="icon-coin-size" src="{{asset('assets/img/icon-coin.svg')}}" alt="内装工事成約で 紹介料3%を支給!!"></span>
        <span class="pl-lg-3 mx-2 mx-lg-0">
            <span class="text-orange-secondary">3%の『60万円』</span>
            <br class="d-lg-none">を紹介料としてお支払い！
        </span>
        <img class="icon-coin-size" src="{{asset('assets/img/icon-coin.svg')}}" alt="内装工事成約で 紹介料3%を支給!!">
    </p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> --}}

<div class="section-wrapper pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="title-flow-image">紹介料支給までの <br class="d-md-none"> 流れとイメージ</h3>
            <div class="col-12">
                <img class="w-100" src="{{asset('assets/img/flow.png')}}" alt="flow">
            </div>
        </div>
    </div>
</div>

<!-- About -->
<div class="section-wrapper about-content">
    <div class="content-blue">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6">
                            <div class="page-header">
                                <p class="heading-title text-uppercase">about</p>
                                <h2 class="sub-title ff-base font-weight-bold"> <span class="d-flex align-items-center justify-content-center"><img class="mr-2" src="{{asset('assets/img/logo.png')}}" alt="Taberuba Logo"> <span>とは？</span></span> </h2>
                            </div>
                        </div>
                    </div>

                    <div class="page-body pb-0">
                        <div class="desc-content">
                            <h3 class="title-desc ff-base font-weight-bold desc-about">これまでの大手ポータルサイトにおいて悩みだった、、</h3>
                        </div>
                        <div class="row justify-content-center py-32">
                            <div class="col-lg-7 col-12">
                                <div class="row justify-content-center">
                                    <div class="col-auto flex-grow-1 text-left">
                                        <ul class="list-about">
                                            <li class="d-flex align-items-center"> <span class="mr-2">問題1</span> 掲載料金が高い</li>
                                            <li class="d-flex align-items-center"> <span class="mr-2">問題2</span> 広告費をかけないと成約しない</li>
                                            <li class="d-flex align-items-center"> <span class="mr-2">問題3</span> 掲載できる情報に制限がある</li>
                                            <li class="d-flex align-items-center"> <span class="mr-2">問題4</span> 集客がポータルサイト頼りになってしまう</li>
                                            <li class="d-flex align-items-center"> <span class="mr-2">問題5</span> 契約期間の縛りがある</li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <img class="about-person-icon" src="{{asset('assets/img/person.svg')}}" alt="これまでの大手ポータルサイトにおいて悩みだった、、">
                                    </div>
                                </div>
                                <div class="row justify-content-center pt-32">
                                    <div class="col-12 position-relative">
                                        <img class="w-100" src="{{asset('assets/img/frame-about.svg')}}" alt="">
                                        <div class="title-frame-about font-weight-bold">
                                            これらを解消いたします！
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="desc-content">
                            <h3 class="title-desc ff-base font-weight-bold desc-about">内装会社「株式会社トラストワン」が運営する
                                <br>「飲食店物件専門」の不動産ポータルサイト！</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-7 col-12">
                                <img class="w-100 pb-40 pt-32" src="{{asset('assets/img/macbook.png')}}" alt="内装会社「株式会社トラストワン」が運営する「飲食店物件専門」の不動産ポータルサイト！">
                                <a href="#" class="btn btn-secondary d-flex align-items-center justify-content-center text-center btn-about rounded-pill">実際に
                                    <img class="align-self-center mx-2 icon-logo" src="{{asset('assets/img/logo-white.svg')}}" alt="Taberuba Logo">を見てみる
                                    <img class="align-self-center ml-2 icon-link" src="{{asset('assets/img/icon-link.svg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End -->
<!-- Advantage -->
<div class="section-wrapper advantage-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="page-header">
                            <p class="heading-title text-uppercase">advantage</p>
                            <h2 class="sub-title ff-base font-weight-bold"> <span class="d-flex align-items-center justify-content-center"><img class="mr-2" src="{{asset('assets/img/logo.png')}}" alt="Taberuba Logo"> <span>の強み</span></span> </h2>
                        </div>
                    </div>
                </div>
                <div class="page-body pb-0">
                    <div class="row mt-5 px-2 px-lg-0">
                        <div class="col-12 advantage-frame position-relative">
                            <div class="label-image">
                                <img src="{{asset('assets/img/label-adv-01.svg')}}" alt="強み01">
                            </div>
                            <div class="row justify-content-center my-64">
                                <div class="col-12">
                                    <p class="title-advantage">基本掲載料<span>無料</span></p>
                                    <div class="desc-content mt-5 mb-2">
                                        <p class="text-center desc-advantage">初期費用も、最低登録物件数の制約も、契約期間の縛りも、成功報酬の請求も一切ございません！
                                        </p>
                                    </div>
                                    <div class="row justify-content-center mt-3">
                                        <div class="col-lg-10">
                                            <img class="w-100" src="{{asset('assets/img/graph1.svg')}}" alt="">
                                        </div>
                                        <div class="desc-content">
                                            <p class="footer-advantage">1物件あたりの利益<br class="d-lg-none">（掲載料分）が増加</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-40 pb-0">
                    <div class="row mt-5 px-2 px-lg-0">
                        <div class="col-12 advantage-frame position-relative">
                            <div class="label-image">
                                <img src="{{asset('assets/img/label-adv-02.svg')}}" alt="強み02">
                            </div>
                            <div class="row justify-content-center my-64">
                                <div class="col-12">
                                    <p class="title-advantage">成約手数料<span>無料</span></p>
                                    <div class="desc-content mt-5 mb-2">
                                        <h3 class="text-center desc-advantage">出店希望者様と不動産業者様のマッチング後は、直接やりとりを行っていただきます。
                                            <br>
                                            成約手数料は一切かかりません。
                                        </h3>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-5">
                                            <img class="w-100" src="{{asset('assets/img/free.svg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-40 pb-0">
                    <div class="row mt-5 px-2 px-lg-0">
                        <div class="col-12 advantage-frame position-relative">
                            <div class="label-image">
                                <img src="{{asset('assets/img/label-adv-03.svg')}}" alt="強み03">
                            </div>
                            <div class="row justify-content-center my-64">
                                <div class="col-12">
                                    <p class="title-advantage">業界初｜紹介料<span>3%</span>が支給されるポータルサイト</p>
                                    <div class="desc-content mt-5 mb-40">
                                        <p class="text-center desc-advantage">内装をお考えの飲食店オーナーに弊社を紹介、内装工事ご成約で『内装工事金額の一部』をもれなくお支払いいたします。
                                            <br>※もちろん、当ポータルサイト経由以外の内装工事ご成約もOK！
                                        </p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-8">
                                                    <img class="w-100 mx-lg-40" src="{{asset('assets/img/group03.png')}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-64">
                    <div class="row px-2 px-lg-0">
                        <div class="col-12 advantage-frame shadow-box py-64 border-0">
                            <div class="desc-content">
                                <h3 class="title-desc ff-base font-weight-bold desc-about d-flex flex-lg-row flex-column align-items-center justify-content-center">
                                    <img class="mr-1" src="{{asset('assets/img/logo.png')}}" alt="">
                                    はなぜ掲載料無料なのか？
                                </h3>
                                <p class="mt-40 mb-4 text-blue-primary fs-18 font-weight-bold">弊社は内装業を主収益としているので、<br class="d-lg-none">掲載料・成約手数料をいただく必要がございません。</p>
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 col-12">
                                        <img class="w-100 px-2" src="{{asset('assets/img/engineer.png')}}" alt="たべるばはなぜ掲載料無料なのか？">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-64 pb-0">
                    <div class="row justify-content-center">
                        <div class="position-relative col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                            <img class="w-100 px-2" src="{{asset('assets/img/frame-banner.png')}}" alt="">
                            <div class="frame-banner">
                                <p class="text-banner">掲載料<span>無料</span></p>
                                <p class="text-sub-banner">※登録後、再登録で無料になります。</p>
                            </div>
                        </div>

                        <div class="position-relative col-lg-4 col-md-6 col-12">
                            <img class="w-100 px-2" src="{{asset('assets/img/frame-banner.png')}}" alt="Taberuba Logo">
                            <div class="frame-banner ">
                                <p class="text-banner">成約手数料<span>無料</span></p>
                            </div>
                        </div>

                        <div class="col-lg-7 col-12 mt-5">
                            <a href="#" class="btn btn-secondary d-flex align-items-center justify-content-center text-center btn-about rounded-pill px-lg-4 px-2">
                                <img class="align-self-center mx-2 icon-logo mb-1" src="{{asset('assets/img/logo-white.svg')}}" alt="">掲載お問合せはコチラ【無料】
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End -->

{{-- Member --}}
<div class="section-wrapper dev-team-content">
    <div class="content-blue">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6">
                            <div class="page-header">
                                <p class="heading-title text-uppercase">（仮）MEMBERS ONLY</p>
                                <h2 class="sub-title ff-base font-weight-bold">会員限定の未公開物件</h2>
                            </div>
                        </div>
                    </div>
                    <div class="page-body pb-3">
                        <div class="col-12 bg-white d-flex align-items-center justify-content-center" style="height: 500px">
                            <p>（仮）内容確定後反映</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FLow -->
<div class="section-wrapper flow-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="page-header">
                            <p class="heading-title text-uppercase">flow</p>
                            <h2 class="sub-title ff-base font-weight-bold">ご登録までの流れ</h2>
                        </div>
                    </div>
                </div>

                <div class="page-body pb-0">
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="flow-list-content line-01">
                                <div class="wrap-box">
                                    <img src="{{asset('assets/img/flow-1.png')}}" class="img-cover lozad" alt="Flow 1">
                                </div>

                                <div class="wrap-desc">
                                    <div class="d-title">
                                        <div class="row content-center justify-content-md-center justify-content-lg-start">
                                            <div class="col-8 sect-top">
                                                <div class="row">
                                                    <div class="col-12 col-lg-4">
                                                        <div class="sect-number">
                                                            <p class="sn-title">01</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-8 p-0">
                                                        <div class="sect-heading">
                                                            <h3 class="ff-base sh-title">掲載お問い合わせ</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sect-caption">
                                        <p class="sc-desc">御社名、所在地などをお知らせください。</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-none d-md-block d-lg-block col line-01-02-wrapper px-0">
                            <div class="line-01-02">
                            </div>
                        </div>

                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="flow-list-content line-02">
                                <div class="wrap-box">
                                    <img src="{{asset('assets/img/flow-2.png')}}" class="img-cover lozad" alt="Flow 2">
                                </div>

                                <div class="wrap-desc">
                                    <div class="d-title">
                                        <div class="row content-center justify-content-md-center justify-content-lg-start">
                                            <div class="col-9 sect-top">
                                                <div class="row">
                                                    <div class="col-12 col-lg-4">
                                                        <div class="sect-number">
                                                            <p class="sn-title">02</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-8 p-0">
                                                        <div class="sect-heading">
                                                            <h3 class="ff-base sh-title">宅建免許証の確認</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sect-caption">
                                        <p class="sc-desc">宅建免許証のコピーをご提出ください。</p>
                                        <p class="fs-12">※審査結果によってはご掲載いただけないケ<br>ースもございます。ご了承ください。</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center d-none d-md-flex d-lg-flex">
                        <div class="col-6 py-5 position-relative">
                            <div class="line-02-03 w-100 my-5">
                            </div>
                            <div class="label-flow-overlap px-3 py-1">
                                3-5営業日程度
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4 mt-5 mt-md-0 position-relative">
                            <div class="label-flow-overlap-sp d-md-none px-3 py-1">
                                3-5営業日程度
                            </div>
                            <div class="flow-list-content line-03 flow-3">
                                <div class="wrap-box">
                                    <img src="{{asset('assets/img/flow-3.png')}}" class="img-cover lozad" alt="Flow 3">
                                </div>

                                <div class="wrap-desc">
                                    <div class="d-title">
                                        <div class="row content-center justify-content-md-center justify-content-lg-start">
                                            <div class="col-lg-7 col-md-8 col-7 sect-top">
                                                <div class="row">
                                                    <div class="col-12 col-lg-4">
                                                        <div class="sect-number">
                                                            <p class="sn-title">03</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-8 p-0">
                                                        <div class="sect-heading">
                                                            <h3 class="ff-base sh-title">システムID送付</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sect-caption">
                                        <p class="sc-desc">ご利用にあたって必要なID/PWをメールします。</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="flow-list-content line-04">
                                <div class="wrap-box">
                                    <img style="height: 5rem; margin-top: 1.5rem" src="{{asset('assets/img/flow-4.png')}}" class="img-cover lozad" alt="Flow 4">
                                </div>

                                <div class="wrap-desc">
                                    <div class="d-title">
                                        <div class="row content-center justify-content-md-center justify-content-lg-start">
                                            <div class="col-7 col-lg-10 sect-top">
                                                <div class="row">
                                                    <div class="col-12 col-lg-3">
                                                        <div class="sect-number">
                                                            <p class="sn-title">04</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-9 p-0">
                                                        <div class="sect-heading">
                                                            <h3 class="ff-base sh-title">掲載情報登録</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sect-caption">
                                        <p class="sc-desc">掲載情報をご登録ください。</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4 col-lg-4 position-relative">
                            <div class="label-flow-4-overlap py-1 d-none d-md-block">
                                即日
                            </div>
                            <div class="flow-list-content last-child line-05">
                                <div class="wrap-box">
                                    <img src="{{asset('assets/img/flow-5.png')}}" class="img-cover lozad" alt="Flow 5">
                                </div>

                                <div class="wrap-desc">
                                    <div class="d-title">
                                        <div class="row content-center justify-content-md-center justify-content-lg-start">
                                            <div class="col-7 sect-top">
                                                <div class="row">
                                                    <div class="col-12 col-lg-4">
                                                        <div class="sect-number">
                                                            <p class="sn-title">05</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-8 p-0">
                                                        <div class="sect-heading">
                                                            <h3 class="d-inline-flex ff-base sh-title bg-green-primary text-white py-1 px-2 text-center">ご掲載開始</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sect-caption">
                                        <p class="sc-desc">物件登録後すぐに物件が公開されます。</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Executive -->
<div class="section-wrapper executive-content py-0">
    <div class="content-blue">
        <div class="container-fluid px-lg-64">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8 text-center d-flex flex-column align-items-center">
                            <h2 class="team-title-header mb-32">心をこめて私たちがみなさまの <br>
                                物件成約のお手伝いを<br class="d-md-none">いたします。</h2>
                            <div class="bg-green-primary" style="height: 2px; width: 32px"></div>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center justify-content-center team-dev-wrapper">
                        <div class="col-lg-2 col-4">
                            <img class="w-100" src="{{asset('assets/img/member-1.jpg')}}" alt="Staff">
                        </div>
                        <div class="col-lg-2 col-4">
                            <img class="w-100" src="{{asset('assets/img/member-2.jpg')}}" alt="Staff">
                        </div>
                        <div class="col-lg-2 col-4">
                            <img class="w-100" src="{{asset('assets/img/member-3.jpg')}}" alt="Staff">
                        </div>
                        <div class="col-lg-2 col-4">
                            <img class="w-100" src="{{asset('assets/img/member-4.jpg')}}" alt="Staff">
                        </div>
                        <div class="col-lg-2 col-4">
                            <img class="w-100" src="{{asset('assets/img/member-5.jpg')}}" alt="Staff">
                        </div>
                        <div class="col-lg-2 col-4">
                            <img class="w-100" src="{{asset('assets/img/member-6.jpg')}}" alt="Staff">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-wrapper faq-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <div class="page-header">
                            <p class="heading-title text-uppercase">faq</p>
                            <h2 class="sub-title ff-base font-weight-bold">よくあるご質問</h2>
                        </div>
                    </div>
                </div>

                <div class="page-body pb-32">
                    <div class="row">
                        <div class="col-12">
                            <div x-data="{faq1: true}">
                                {{-- faq 1 --}}
                                <div class="faq-wrapper mb-3" x-bind:class="faq1 ? 'text-white bg-green-primary' : '' ">
                                    <a class="d-flex align-items-center" role="button" x-on:click="faq1 = !faq1">
                                        <div class="mr-3 font-weight-bold">Q1:</div>
                                        <div class="flex-grow-1 text-left">たべるばへのお問い合わせはどのように行ったらよろしいですか？</div>
                                        <div>
                                            <img x-bind:class="!faq1 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                            <img x-bind:class="faq1 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                        </div>
                                    </a>
                                </div>
                                <div class="faq-child text-left" x-show="faq1" x-collapse.duration.500ms>
                                    <p> A:「掲載希望申請/お問い合わせ」フォームに入力をお願いします。内容を確認し、弊社担当者よりご連絡させていただきます。</p>
                                </div>
                            </div>
                            <div x-data="{faq2: false}">
                                {{-- faq 2 --}}
                                <div class="faq-wrapper mb-3" x-bind:class="faq2 ? 'text-white bg-green-primary' : '' ">
                                    <a class="d-flex align-items-center" role="button" x-on:click="faq2 = !faq2">
                                        <div class="mr-3 font-weight-bold">Q2:</div>
                                        <div class="flex-grow-1 text-left">物件の価格は税込み表記ですか？</div>
                                        <div>
                                            <img x-bind:class="!faq2 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                            <img x-bind:class="faq2 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                        </div>
                                    </a>
                                </div>
                                <div class="faq-child text-left" x-show="faq2" x-collapse>
                                    <p>A: はい、価格は全て税込み表記となります。</p>
                                </div>
                            </div>
                            <div x-data="{faq3: false}">
                                {{-- faq 3 --}}
                                <div class="faq-wrapper mb-3" x-bind:class="faq3 ? 'text-white bg-green-primary' : '' ">
                                    <a class="d-flex align-items-center" role="button" x-on:click="faq3 = !faq3">
                                        <div class="mr-3 font-weight-bold">Q3:</div>
                                        <div class="flex-grow-1 text-left">掲載料・成約手数料無料となっていますが、別でかかる費用はありますか？</div>
                                        <div>
                                            <img x-bind:class="!faq3 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                            <img x-bind:class="faq3 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                        </div>
                                    </a>
                                </div>
                                <div class="faq-child text-left" x-show="faq3" x-collapse>
                                    <p>A: 別でかかる費用は一切ございません。</p>
                                </div>
                            </div>

                            <div x-data="{faq4: false}">
                                {{-- faq 4 --}}
                                <div class="faq-wrapper mb-3" x-bind:class="faq4 ? 'text-white bg-green-primary' : '' ">
                                    <a class="d-flex align-items-center" role="button" x-on:click="faq4 = !faq4">
                                        <div class="mr-3 font-weight-bold">Q4:</div>
                                        <div class="flex-grow-1 text-left">運営会社はどこですか？</div>
                                        <div>
                                            <img x-bind:class="!faq4 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                            <img x-bind:class="faq4 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                        </div>
                                    </a>
                                </div>
                                <div class="faq-child text-left" x-show="faq4" x-collapse>
                                    <p>A: 株式会社トラストワンが運営しております。トラストワンでは年間100以上の店舗の内装を行う豊富な実績があり、一部上場企業様と多数の取引実績もございます。</p>
                                </div>
                            </div>

                            <div x-data="{faq5: false}">
                                {{-- faq 5 --}}
                                <div class="faq-wrapper mb-3" x-bind:class="faq5 ? 'text-white bg-green-primary' : '' ">
                                    <a class="d-flex align-items-center" role="button" x-on:click="faq5 = !faq5">
                                        <div class="mr-3 font-weight-bold">Q5:</div>
                                        <div class="flex-grow-1 text-left">どんな業態の店舗物件が登録できますか？</div>
                                        <div>
                                            <img x-bind:class="!faq5 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                            <img x-bind:class="faq5 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                        </div>
                                    </a>
                                </div>
                                <div class="faq-child text-left" x-show="faq5" x-collapse>
                                    <p>A: 重飲食（居酒屋や中華料理屋、焼き肉屋等）または軽飲食（カフェやバー・スナック等）の業態可能な店舗物件が登録できます。また居抜き・スケルトンのどちらも登録可能です。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact -->
<div class="section-wrapper contact-content py-0" id="contact">
    <div class="content-blue pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6">
                            <div class="page-header">
                                <p class="heading-title text-uppercase">REQUEST / CONTACT</p>
                                <h2 class="sub-title ff-base font-weight-bold">掲載希望申請 / お問い合わせ</h2>
                            </div>
                        </div>
                    </div>

                    <div class="page-body pb-0 text-left" x-data="{aggrement: false}">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-12 contact-form">
                                <div class="d-flex">
                                    <p class="title-form">お問い合わせカテゴリー</p>
                                    <span class="label-required ml-2">必須</span>
                                </div>
                                <form method="POST" action="{{route('lp.contact')}}" class="mb-lg-64 mb-32" id="contact-form">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input input-contact-radio" type="radio" name="category" id="inlineRadio1" value="掲載希望申請" required data-parsley-errors-container="#error-category">
                                            <label class="form-check-label label-contact fw-400 mb-0" for="inlineRadio1">掲載希望申請</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input input-contact-radio" type="radio" name="category" id="inlineRadio2" value="お問い合わせ" required data-parsley-errors-container="#error-category">
                                            <label class="form-check-label label-contact fw-400 mb-0" for="inlineRadio2">お問い合わせ</label>
                                        </div>
                                        <div class="validation-fb" id="error-category">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="" class="label-contact">企業名
                                            <span class="label-required ml-2">必須</span>
                                        </label>
                                        <input type="text" name="company_name" class="input-contact" placeholder="例）株式会社トラストワン" required data-parsley-errors-container="#error-company">
                                        <div class="validation-fb" id="error-company">

                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="" class="label-contact">担当者名
                                            <span class="label-required ml-2">必須</span>
                                        </label>
                                        <input type="text" name="contact_name" class="input-contact" placeholder="例）山田 太郎" required data-parsley-errors-container="#error-contact">
                                        <div class="validation-fb" id="error-contact">

                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="" class="label-contact">Webサイト
                                        </label>
                                        <input type="text" name="website" class="input-contact" placeholder="例）https://trust-one.net/">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="" class="label-contact">お電話番号
                                            <span class="label-required ml-2">必須</span>
                                        </label>
                                        <input type="text" name="phone" onkeypress="validate(event)" class="input-contact" placeholder="例）08000000001" required data-parsley-errors-container="#error-phone">
                                        <div class="validation-fb" id="error-phone">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="" class="label-contact">メールアドレス
                                            <span class="label-required ml-2">必須</span>
                                        </label>
                                        <input data-parsley-errors-container="#error-email" type="email" name="email" class="input-contact" placeholder="例）yamada.tarou@yamada.co.jp" required data-parsley-type="email" data-parsley-error-message="必須項目です。メールアドレスが正しくありません。" data-parsley-errors-container="#error-email">
                                        <div class="validation-fb" id="error-email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="" class="label-contact">ご要望・ご質問等
                                        </label>
                                        <textarea placeholder="こちらにご要望・ご質問等をお書きください" class="input-contact py-3" name="description" id="" cols="30" rows="10" style="height: 240px;"></textarea>
                                    </div>
                                    <div class="text-center mt-5">
                                        <div class="d-flex justify-content-center mb-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input input-contact-checkbox" type="checkbox" name="policy" value="1" required data-parsley-errors-container="#error-policy" data-parsley-error-message="個人情報保護方針にご同意いただける場合は、チェックボックスにチェックを入れ、同意の上「送信する」を押してください。">
                                                <label class="form-check-label label-contact fw-400 fs-14 mb-0"></label>
                                                <a role="button" x-on:click="aggrement = true" class="policy-link">個人情報保護方針</a> <span class="label-contact fw-400 fs-14 mb-0">に同意する</span>
                                            </div>
                                        </div>
                                        <div class="validation-fb d-block" id="error-policy">
                                        </div>
                                        <button type="submit" class="btn btn-secondary px-5 py-3 btn-submit-contact">送信する</button>
                                    </div>
                                    <div id="agreement-content" :style="aggrement == true ? 'display: block' : 'display: hidden' ">
                                        <!--popup-->
                                        <div class="wrapper-popup-agreement">
                                            <div class="content-popup">
                                                <a role="button" x-on:click="aggrement = false">
                                                    <i class="fa fa-times-circle close-popups" aria-hidden="true"></i>
                                                </a>
                                                <div class="agreement-wrapper">
                                                    <div class="container">
                                                        <h2 class="title-agreement text-center">個人情報保護方針</h2>

                                                        <p class="mb-4 text-333">株式会社トラストワン（以下、当社）は、当社が取得した個人情報の取扱いに関し、個人情報の保護に関する法律、個人情報保護に関するガイドライン等の指針、その他個人情報保護に関する関係法令を遵守します。</p>
                                                        <div class="">
                                                            <h3 class="title">個人情報の安全管理</h3>
                                                        </div>
                                                        <p>当社は、個人情報の保護に関して、組織的、物理的、人的、技術的に適切な対策を実施し、当社の取り扱う個人情報の漏えい、滅失又はき損の防止その他の個人情報の安全管理のために必要かつ適切な措置を講ずるものとします。</p>

                                                        <div class="">
                                                            <h3 class="title">個人情報の取得等の遵守事項</h3>
                                                        </div>
                                                        <p class="mb-4">当社による個人情報の取得、利用、提供については、以下の事項を遵守します。</p>

                                                        <ol class="sub-list ml-5">
                                                            <li class="sub-numbering-list">
                                                                <b>個人情報の取得</b>
                                                                <p class="mb-4 mt-4">本サービスにおいて当社が収集する利用者情報は、その収集方法に応じて、以下のようなものとなります。</p>
                                                                <ol class="sub-list ml-4">
                                                                    <li class="circle-numbering mb-4 font-14">
                                                                        お客様からご提供いただく情報<br>
                                                                        <p class="mt-4">本サービスを利用するために、お客様からご提供いただく情報は以下のとおりです。</p>
                                                                        <ul class="list-disc">
                                                                            <li>氏名</li>
                                                                            <li>住所</li>
                                                                            <li>電話番号</li>
                                                                            <li>メールアドレス</li>
                                                                            <li>生年月日</li>
                                                                            <li>年齢</li>
                                                                            <li>性別</li>
                                                                            <li>クレジットカード情報</li>
                                                                            <li>その他当社が定める入力フォームにお客様が入力する情報</li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="circle-numbering mb-4 font-14">
                                                                        お客様が本サービスの利用において、他のサービスと連携を許可することにより、当該他のサービスから提供される情報<p class="mt-4">お客様が、本サービスを利用するにあたり、ソーシャルネットワークサービス等の外部サービスとの連携を許可した場合には、その許可の際に連携を許可した外部サービスから提供された情報を収集することがあります。これには以下の情報が含まれます。<br>当該外部サービスでお客様が利用するID等の識別情報。<br>その他当該外部サービスのプライバシー設定によりお客様が連携先に開示を認めた情報。</p>
                                                                    </li>
                                                                    <li class=" circle-numbering mb-4 font-14">
                                                                        お客様が本サービスを利用するにあたって、当社が収集する情報
                                                                        <ul class="mt-01 list-disc">
                                                                            <li class="mt-4">当社は、本サービスへのアクセス状況やそのご利用方法に関する情報を収集することがあります。これには以下の情報が含まれます。</li>
                                                                            <li>契約者・端末固有ID（OSが生成するID（Android ID）、独自端末識別番号（UDID）、加入者識別ID（IMSI）、端末識別ID（IMEI）、MACアドレス等</li>
                                                                            <li>ログ情報</li>
                                                                            <li>Cookie技術を用いて生成された識別情報</li>
                                                                        </ul>
                                                                    </li>
                                                                </ol>
                                                            </li>
                                                            <li class="sub-numbering-list">
                                                                <b>個人情報の利用目的</b>
                                                                <ol class="sub-list ml-4">
                                                                    <li class="circle-numbering mb-4 mt-4 font-14">
                                                                        利用者情報は本条第2項に定めるとおり本サービスの提供のために利用されるほか、本条第3項に定めるとおり、その他の目的にも利用される場合があります。</li>
                                                                    <li class="circle-numbering mb-4 font-14">本サービスのサービス提供にかかわる利用者情報の具体的な利用目的は以下のとおりです。
                                                                        <ul class="ml-4 list-disc">
                                                                            <li>本サイトの運営、維持、管理</li>
                                                                            <li>本サイトを通じたサービスの提供及び紹介</li>
                                                                            <li>本サイトの品質向上のためのアンケート</li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="circle-numbering font-14">上記本条第2項以外の利用目的は以下のとおりです。
                                                                        <ul class="ml-4 list-disc">
                                                                            <li>当社のサービスに関連して、個人を識別できない形式に加工した統計データを作成するため。（対応する利用者情報の項目）
                                                                                <ul class="ml-70 mb-4 list-disc">
                                                                                    <li>契約者・端末固有ID</li>
                                                                                    <li>年齢</li>
                                                                                    <li>性別</li>
                                                                                    <li>居住する地域</li>
                                                                                    <li>ページ内の画面遷移情報</li>
                                                                                    <li>お気に入りの意匠設計の情報</li>
                                                                                    <li>レビュー等の情報のすべて</li>
                                                                                    <li>決済金額・決済回数</li>
                                                                                    <li>その他ログ情報</li>
                                                                                    <li>その他Cookie技術を用いて生成された識別情報</li>
                                                                                    <li>位置情報</li>
                                                                                </ul>
                                                                            </li>
                                                                            <li>本サービスに係るリコメンド機能の精度改善など、当社または第三者の広告の配信または表示のため。（対応する利用者情報の項目）
                                                                                <ul class="ml-70 mb-4 list-disc">
                                                                                    <li>契約者・端末固有ID</li>
                                                                                    <li>年齢</li>
                                                                                    <li>性別</li>
                                                                                    <li>居住する地域</li>
                                                                                    <li>ページ内の画面遷移情報</li>
                                                                                    <li>お気に入りの意匠設計の情報</li>
                                                                                    <li>レビュー情報のすべて</li>
                                                                                    <li>決済金額・決済回数</li>
                                                                                    <li>その他ログ情報</li>
                                                                                    <li>その他Cookie技術を用いて生成された識別情報</li>
                                                                                    <li>位置情報</li>
                                                                                </ul>
                                                                            </li>
                                                                            <li>その他マーケティング等の情報分析等に活用するため。（対応する利用者情報の項目）
                                                                                <ul class="ml-70 list-disc">
                                                                                    <li>氏名</li>
                                                                                    <li>メールアドレス</li>
                                                                                    <li>生年月日</li>
                                                                                    <li>年齢</li>
                                                                                    <li>性別</li>
                                                                                    <li>居住する地域</li>
                                                                                    <li>ページ内の画面遷移情報</li>
                                                                                    <li>お気に入りの意匠設計の情報</li>
                                                                                    <li>レビュー情報のすべて</li>
                                                                                    <li>決済金額・決済回数</li>
                                                                                    <li>その他当社が定める入力フォームにお客様が入力する情報。</li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ol>
                                                            </li>
                                                        </ol>

                                                        <div class="">
                                                            <h3 class="title">個人情報の提供等</h3>
                                                        </div>
                                                        <p>当社は、法令で定める場合を除き、本人の同意に基づき取得した個人情報を、本人の事前の同意なく第三者に提供することはありません。なお、本人の求めによる個人情報の開示、訂正、追加若しくは削除又は利用目的の通知については、法令に従いこれを行うとともに、ご意見、ご相談に関して適切に対応します。</p>
                                                        <div class="">
                                                            <h3 class="title">個人情報の利用目的の変更</h3>
                                                        </div>
                                                        <p>当社は、前項で特定した利用目的は、予め本人の同意を得た場合を除くほかは、原則として変更しません。但し、変更前の利用目的と相当の関連性を有すると合理的に認められる範囲において、予め変更後の利用目的を公表の上で変更を行う場合はこの限りではありません。</p>
                                                        <div class="">
                                                            <h3 class="title">個人情報の第三者提供</h3>
                                                        </div>
                                                        <p>当社は、個人情報の取扱いの全部又は一部を第三者に委託する場合、その適格性を十分に審査し、その取扱いを委託された個人情報の安全管理が図られるよう、委託を受けた者に対する必要かつ適切な監督を行うこととします。</p>
                                                        <div class="">
                                                            <h3 class="title">個人情報の訂正・削除・利用停止</h3>
                                                        </div>
                                                        <ol class="sub-list numbering">
                                                            <li>当社は、お客様から①個人情報が真実でないという理由によって個人情報保護法の定めに基づきその内容の訂正を求められた場合、及び②あらかじめ公表された利用目的の範囲を超えて取り扱われているという理由または偽りその他不正の手段により収集されたものであるという理由により、個人情報保護法の定めに基づきその利用の停止を求められた場合、③お客様に関する保有個人データが第三者提供の制限に関する個人情報保護法の定めに違反して第三者に提供されているという理由によって、第三者への提供の停止を求められた場合には、お客様ご本人からのご請求であることを確認の上で遅滞なく必要な調査を行い、その結果に基づき、個人情報の内容の訂正、利用停止、または第三者への提供の停止を行い、その旨をお客様に通知します。なお、合理的な理由に基づいて訂正利用停止、または第三者への提供の停止を行わない旨の決定をしたときは、お客様に対してその旨を通知いたします。</li>
                                                            <li>当社は、お客様から、お客様の個人情報について消去を求められた場合、当社が当該請求に応じる必要が有ると判断した場合は、お客様ご本人からのご請求であることを確認の上で、個人情報の消去を行い、その旨をお客様に通知します。</li>
                                                            <li>個人情報保護法その他の法令により、当社が訂正等又は利用停止等の義務を負わない場合は、前2項の規定は適用されません。</li>
                                                        </ol>
                                                        <div class="">
                                                            <h3 class="title">個人情報の開示</h3>
                                                        </div>
                                                        <p>当社は、お客様から、個人情報保護法の定めに基づき個人情報の開示を求められたときは、お客様ご本人または正当な代理人からのご請求であることを当社所定の方法により確認した上で（本人確認書類のご提示をお願いする場合があります）、お客様に対し、遅滞なく開示を行います（当該個人情報が存在しないときにはその旨を通知いたします）。但し、個人情報保護法その他の法令により、当社が開示の義務を負わない場合は、この限りではありません。</p>
                                                        <div class="">
                                                            <h3 class="title">事業の譲渡</h3>
                                                        </div>
                                                        <p>運営者は経営上、本サービスに関わる事業部門を譲渡する場合があります。その際お客様に関する情報は、通常、譲渡される事業資産とみなされますが、運営者はーに提供する本サービスを継続するため、またはその他の事業上の目的のために、ーの個人情報の全部・または一部を移転させることがあります。</p>
                                                        <div class="">
                                                            <h3 class="title">事業者の氏名、個人情報保護管理者（若しくはその代理人）の氏名又は職名，所属及び連絡先</h3>
                                                        </div>
                                                        <p>事業者の氏名又は名称：株式会社トラストワン<br>お問合せ先：総務 高橋<br>0244-25-4412（受付時間　月〜金 9時〜17時 土日・祝祭日休業）</p>
                                                        <div class="">
                                                            <h3 class="title">個人情報の開示、利用目的の通知、利用の停止、消去及び第三者への提供の停止／お問合わせ</h3>
                                                        </div>
                                                        <p>※個人情報の開示、利用目的の通知、利用の停止、消去及び第三者への提供の停止、その他個人情報の取扱いに関する苦情についても上記までお問合わせください。<br>お問合せ先：総務 高橋<br>0244-25-4412（受付時間　月〜金 9時〜17時 土日・祝祭日休業）</p>
                                                        <div class="">
                                                            <h3 class="title">改訂について</h3>
                                                        </div>
                                                        <p>当社は、保有する個人情報に関して適用される法令、規範を遵守すると共に、本プライバシーポリシーを必要に応じ見直し、改善に努めます。当社は、プライバシーポリシーを変更する場合があります。プライバシーポリシーに重要な変更がある場合には、サイト上で告知します。本ページを都度ご確認の上、当社のプライバシーポリシーをご理解いただくようお願いします。
                                                            <br>なお、当社運営サイト上やメールマガジン等において、外部のサイトへのリンクが貼られることがあります。この外部のサイトで登録される個人情報は、当社で管轄する情報ではない為、一切の責任を負うことができません。外部サイトで個人情報を登録される場合は、そのサイトのプライバシーポリシーをご確認ください。</p>


                                                        <div class="">
                                                            <h3 class="title">お問い合せ窓口</h3>
                                                        </div>
                                                        <p class="text-333">株式会社トラストワン 東京本社<br>住所: 〒102-0073<br>東京都千代田区九段北1-14-21
                                                            <br class="sp-only">九段アイレックスビル6F<br>TEL : 050-5807-2335&nbsp;&nbsp;&nbsp;<br class="sp-only">FAX : 050-5807-2335<br>Email : taberuba@trust-one.net</p>
                                                    </div>
                                                </div>
                                                <div class="button-wrapper">
                                                    <div class="container">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <div class="close-agreement btn-agreement">閉じる</div>
                                                            <div class="check-agreement btn-agreement">同意する</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--popup-->

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End -->
<!-- End -->
@endsection
@push('scripts')
<script src="{{asset('plugins/parsley/parsley.min.js')}}"></script>
@if (App::isLocale('en'))
<script src="{{asset('plugins/parsley/i18n/en.js')}}"></script>
@elseif (App::isLocale('ja'))
<script src="{{asset('plugins/parsley/i18n/ja.js')}}"></script>
@endif

<script>
    $(document).ready(function() {
        $('#contact-form').parsley({
            errorClass: 'error'
        , });
    });

</script>
@endpush
