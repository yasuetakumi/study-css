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
                            <img class="d-inline-block d-lg-none pt-4" src="{{asset('assets/img/top-brand.svg')}}" alt="">
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
<div class="section-wrapper py-0">
	<div class="content-payment section-64">
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

<div class="section-wrapper py-0">
    <div class="section-64">
        <div class="container">
            <div class="row justify-content-center">
                <p style="font-size: 28px;" class="font-weight-bold">紹介料支給までの流れとイメージ</p>
                <div class="col-12">
                    <img class="w-100" src="{{asset('assets/img/flow.png')}}" alt="flow">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
