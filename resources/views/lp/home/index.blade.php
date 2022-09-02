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
					<div class="banner-caption">
						<div class="col-12">
							<div class="row justify-content-center m-0">
								<div class="col-12 p-0">
									<div class="text-center">
                                        <p class="banner-sub-title">飲食店専門</p>
                                    </div>
                                    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
                                        <p class="banner-sub-title mb-0">新しい不動産ポータルサイト</p>
                                        <span><img class="block" src="{{asset('assets/img/logo.png')}}" alt="taberuba-logo"></span>
                                    </div>

									<div class="row justify-content-center">
										<div class="col-12">
											<div class="banner-desc">
												<p class="sub-heading font-weight-bold">飲食店向けの</p>
												<p class="main-heading font-weight-bold">物件大募集!!</p>
											</div>
										</div>
									</div>

                                    <div class="row justify-content-center">
                                        <div class="position-relative col-md-4 col-12 mb-4 mb-lg-0">
                                            <img class="w-100 px-2" src="{{asset('assets/img/frame-banner.png')}}" alt="">
                                            <div class="frame-banner">
                                                <p class="text-banner">掲載料基本<span>無料</span></p>
                                                <p class="text-sub-banner">※登録後、再登録で無料になります。</p>
                                            </div>
                                        </div>

                                        <div class="position-relative col-md-4 col-12">
                                            <img class="w-100 px-2" src="{{asset('assets/img/frame-banner.png')}}" alt="">
                                            <div class="frame-banner">
                                                <p class="text-banner">成約手数料<span>無料</span></p>
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
</div>
<!-- End -->

<div class="section-top price-content">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="price-top">
					<div class="row justify-content-center">
						<div class="col-12 col-lg-11">
							<div class="page-header position-relative">
                                <div class="top-brand-logo d-none d-lg-block">
                                    <img src="{{asset('assets/img/top-brand.svg')}}" alt="">
                                </div>
								<p class="heading-title text-uppercase">REFERRAL FEE</p>
								<h2 class="sub-title ff-base font-weight-bold">内装工事成約で <br class="d-lg-none"> <span style="color: #FE2020">紹介料3%</span>を支給!!</h2>
							</div>
                            <img class="d-inline-block d-lg-none pt-5" src="{{asset('assets/img/top-brand.svg')}}" alt="">
                            <div class="page-body pb-0">

                                <div class="desc-content">
                                    <h3 class="title-desc ff-base font-weight-bold">改装工事をご紹介いただき成約した場合、<br class="d-lg-none"> 紹介料として内装工事費用の3%受け取れます。</h3>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section-wrapper">
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
                                    <p class="text-sub-payment">
                                        <span><img class="icon-coin-size" src="{{asset('assets/img/icon-coin.svg')}}" alt=""></span>
                                        <span>3%の『60万円』</span>を紹介料としてお支払い！
                                        <span><img class="icon-coin-size" src="{{asset('assets/img/icon-coin.svg')}}" alt=""></span>
                                    </p>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section-wrapper">
    <div class="container">
		<div class="row justify-content-center">
			<p style="font-size: 28px;" class="font-weight-bold">紹介料支給までの流れとイメージ</p>
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
						<div class="col-12 col-lg-8">
							<div class="page-header">
								<p class="heading-title text-uppercase">about</p>
								<h2 class="sub-title ff-base font-weight-bold"> <span class="d-flex align-items-center justify-content-center"><img src="{{asset('assets/img/logo.png')}}" alt=""> <span>とは？</span></span> </h2>
							</div>
						</div>
					</div>

					<div class="page-body">
						<div class="desc-content">
                            <h3 class="title-desc ff-base font-weight-bold desc-about">これまでの大手ポータルサイトにおいて悩みだった、、</h3>
                        </div>
                        <div class="row justify-content-center py-48">
                            <div class="col-lg-7 col-12">
                                <div class="row justify-content-center">
                                    <div class="col-auto flex-grow-1 text-left">
                                        <ul class="list-about">
                                            <li class="d-flex align-items-center"> <span class="mr-2">問題1</span> 掲載料金が高い</li>
                                            <li class="d-flex align-items-center"> <span class="mr-2">問題1</span> 広告費をかけないと成約しない</li>
                                            <li class="d-flex align-items-center"> <span class="mr-2">問題1</span> 掲載できる情報に制限がある</li>
                                            <li class="d-flex align-items-center"> <span class="mr-2">問題1</span> 集客がポータルサイト頼りになってしまう</li>
                                            <li class="d-flex align-items-center"> <span class="mr-2">問題1</span> 契約期間の縛りがある</li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <img class="about-person-icon" src="{{asset('assets/img/person.svg')}}" alt="">
                                    </div>
                                </div>
                                <div class="row justify-content-center pt-4">
                                    <div class="col-12 position-relative">
                                        <img class="w-100" src="{{asset('assets/img/frame-about.svg')}}" alt="">
                                        <div class="title-frame-about">
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
                                <img class="w-100 py-4" src="{{asset('assets/img/macbook.png')}}" alt="">
                                <a href="#" class="btn btn-secondary d-flex align-items-center justify-content-center text-center btn-about rounded-pill">実際に
                                    <img class="align-self-center mx-2 icon-logo" src="{{asset('assets/img/logo-white.svg')}}" alt="">を見てみる
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
					<div class="col-12 col-lg-8">
						<div class="page-header">
							<p class="heading-title text-uppercase">advantage</p>
							<h2 class="sub-title ff-base font-weight-bold"> <span class="d-flex align-items-center justify-content-center"><img src="{{asset('assets/img/logo.png')}}" alt=""> <span>の強み</span></span> </h2>
						</div>
					</div>
				</div>
				<div class="page-body mt-lg-64 pb-0">
                    <div class="row mt-5 px-2 px-lg-0">
                        <div class="col-12 advantage-frame position-relative">
                            <div class="label-image">
                                <img src="{{asset('assets/img/label-adv-01.svg')}}" alt="">
                            </div>
                            <div class="row justify-content-center py-5">
                                <div class="col-lg-10 col-12">
                                    <p class="title-advantage">基本掲載料<span>無料</span></p>
                                    <div class="desc-content mt-5 mb-2">
                                        <h3 class="text-center desc-advantage">初期費用も、最低登録物件数の制約も、契約期間の縛りも、成功報酬の請求も一切ございません！
                                            <br>
                                            <span class="desc-sub-advantage">※有償ソフトウェアが必要な場合は別途実費精算となります</span>
                                        </h3>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10">
                                            <img class="w-100" src="{{asset('assets/img/graph1.svg')}}" alt="">
                                        </div>
                                        <div class="desc-content">
                                            <h3 class="footer-advantage">1物件あたりの利益 <br class="d-lg-none">（掲載料分）が増加</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>

                <div class="page-body mt-lg-64 pb-0">
                    <div class="row mt-5 px-2 px-lg-0">
                        <div class="col-12 advantage-frame position-relative">
                            <div class="label-image">
                                <img src="{{asset('assets/img/label-adv-02.svg')}}" alt="">
                            </div>
                            <div class="row justify-content-center py-5">
                                <div class="col-lg-10 col-12">
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

                <div class="page-body mt-lg-64 pb-0">
                    <div class="row mt-5 px-2 px-lg-0">
                        <div class="col-12 advantage-frame position-relative">
                            <div class="label-image">
                                <img src="{{asset('assets/img/label-adv-03.svg')}}" alt="">
                            </div>
                            <div class="row justify-content-center py-5">
                                <div class="col-lg-10 col-12">
                                    <p class="title-advantage">業界初｜紹介料<span>3%</span>が支給されるポータルサイト</p>
                                    <div class="desc-content my-5">
                                        <h3 class="text-center desc-advantage">内装をお考えの飲食店オーナーに弊社を紹介、内装工事ご成約で『内装工事金額の3%』をもれなくお支払いいたしま
                                            <br>
                                            す。※もちろん、当ポータルサイト経由以外の内装工事ご成約もOK！
                                        </h3>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-11 col-12">
                                            <p class="text-payment-advantage">例えば2,000万円の内装工事が成約した場合…</p>
                                            <div class="d-flex alig-items-center justify-content-center">
                                                <img class="icon-coin-size d-lg-block d-none" src="{{asset('assets/img/icon-coin.svg')}}" alt="">
                                                <p class="text-sub-payment-advantage">
                                                    <span><img class="icon-coin-size d-lg-none" src="{{asset('assets/img/icon-coin.svg')}}" alt=""></span>
                                                    <span>3%の『60万円』</span>
                                                    <span><img class="icon-coin-size d-lg-none" src="{{asset('assets/img/icon-coin.svg')}}" alt=""></span>
                                                     <br class="d-lg-none">を紹介料としてお支払い！

                                                </p>
                                                <img class="icon-coin-size d-lg-block d-none" src="{{asset('assets/img/icon-coin.svg')}}" alt="">
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
</div>
<!-- End -->

@endsection
