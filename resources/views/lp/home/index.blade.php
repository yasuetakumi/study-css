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
                        <div class="col-12 advantage-frame shadow-box pt-64 border-0">
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

					<div class="page-body pb-0 text-left">
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
                                        <input data-parsley-errors-container="#error-email" type="email" name="email" class="input-contact" placeholder="例）yamada.tarou@yamada.co.jp" required
                                            data-parsley-type="email"
                                            data-parsley-error-message="必須項目です。メールアドレスが正しくありません。"
                                            data-parsley-errors-container="#error-email">
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
                                                <input class="form-check-input input-contact-checkbox" type="checkbox" name="policy" id="inlineCheckbox1" value="1" required data-parsley-errors-container="#error-policy" data-parsley-error-message="個人情報保護方針にご同意いただける場合は、チェックボックスにチェックを入れ、同意の上「送信する」を押してください。">
                                                <label class="form-check-label label-contact fw-400 fs-14 mb-0" for="inlineCheckbox1"><a href="#" class="policy-link">個人情報保護方針</a> に同意する</label>
                                            </div>
                                        </div>
                                        <div class="validation-fb d-block" id="error-policy">
                                        </div>
                                        <button type="submit" class="btn btn-secondary px-5 py-3 btn-submit-contact">送信する</button>
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
                errorClass: 'error',
            });
        });
    </script>
@endpush
