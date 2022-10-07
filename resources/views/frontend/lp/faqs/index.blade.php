@extends('frontend.lp.layouts.app')

@section('title', '業界初のキャッシュバック制度がある【飲食店物件専門】の不動産ポータルサイトです。 | たべるば')

@section('description', '飲食店専門の新しい不動産ポータルサイト「たべるば」に掲載する飲食店向けの物件を大募集しています。業界初、内装工事成約で紹介料を支給！掲載料無料！成約手数料無料！の不動産ポータルサイトです。')

@section('content')
{{-- Breadcrumbs --}}
<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row mx-0">
            <div class="col-12 p-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">トップページ</a></li>
                        <li class="breadcrumb-item"><a href="">よくあるご質問</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- FAQs -->

    <div class="section-wrapper faq-content faq-page">
        <div class="container">
            <div class="row justify-content-center">
                        <div class="col-12 col-lg-7 col-md-10 col-sm-10">
                            <div class="page-header">
                                <p class="heading-title text-uppercase">faq</p>
                                <h2 class="sub-title ff-base font-weight-bold">よくあるご質問</h2>
                            </div>
                        </div>


                        <div class="col-10 col-lg-9 col-md-12 page-body pb-32">
                            <div class="row">
                                {{-- 会員登録について --}}
                                <div class="col-12">
                                    <h3 class="third-title faq-category text-left">
                                        会員登録について
                                    </h3>
                                </div>
                                <div class="col-12">
                                    <div class="cursor-pointer" x-data="{faq1: false}">
                                        {{-- faq 1 --}}
                                        <a class="d-block faq-wrapper mb-3" x-bind:class="faq1 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq1 = !faq1" data-toggle="collapse"
                                            href="#faqCollapse1" aria-expanded="false" aria-controls="faqCollapse1">
                                            <div class="d-flex align-items-center" >
                                                <div class="mr-3 font-weight-bold">Q1:</div>
                                                <div class="flex-grow-1 text-left">料金はかかりますか？</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq1 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq1 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse1">
                                            <div class="faq-child text-left">
                                                <p>無料で登録できます。入会金や年会費などはございません。会員登録がお済みではない場合は以下よりご登録ください。</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer" x-data="{faq2: false}">
                                        {{-- faq 2 --}}
                                        <a class="d-block faq-wrapper mb-3" x-bind:class="faq2 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq2 = !faq2" data-toggle="collapse"
                                            href="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3 font-weight-bold">Q2:</div>
                                                <div class="flex-grow-1 text-left">だれでも登録できますか？</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq2 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq2 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse2">
                                            <div class="faq-child text-left">
                                                <p>飲食店出店希望者または飲食店オーナーの方ならどなたでもご登録いただけます。<br>
                                                    ただし、不動産業を営む方、宅地建物取引業免許を有する方、求人広告掲載事業を営む方もしくはこれらに準ずる方への会員登録はできませんので、ご了承ください。</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer" x-data="{faq3: false}">
                                        {{-- faq 3 --}}
                                        <a class="d-block faq-wrapper mb-3" x-bind:class="faq3 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq3 = !faq3" data-toggle="collapse"
                                            href="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                                            <div class="d-flex align-items-center" >
                                                <div class="mr-3 font-weight-bold">Q3:</div>
                                                <div class="flex-grow-1 text-left">会員登録すると、どんなサービスが受けられますか？</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq3 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq3 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse3">
                                            <div class="faq-child text-left">
                                                <p>物件の詳細情報の閲覧、物件探しのご相談、内覧会の同伴など、飲食店の出店をサポートするサービスをご利用いただけます。</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cursor-pointer" x-data="{faq4: false}">
                                        {{-- faq 4 --}}
                                        <a class="d-block faq-wrapper mb-0" x-bind:class="faq4 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq4 = !faq4" data-toggle="collapse"
                                            href="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3 font-weight-bold">Q4:</div>
                                                <div class="flex-grow-1 text-left">本登録・登録完了メールが届きません。</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq4 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq4 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse4">
                                            <div class="faq-child text-left">
                                                <p>ご入力したメールアドレスに誤りがないかをご確認いただき、もし届かない場合は以下をご確認ください。</p>
                                                <br>
                                                <p>
                                                    ①ドメイン指定受信をしている場合は、予め「@taberuba.com」からのメールが受信できるように設定をお願いいたします。<br>
                                                    ②携帯アドレスでご登録される場合、パソコンからのメールを一括して制限する設定や、ドメイン指定で受信する設定になっている場合は、仮登録メールが届かなくなってしまいますので、「@taberuba.com」からのメールが受信できるよう設定をお願いいたします。
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- ログインについて --}}
                                <div class="col-12">
                                    <h3 class="third-title faq-category text-left">
                                        ログインについて
                                    </h3>
                                </div>
                                <div class="col-12">
                                    <div class="cursor-pointer" x-data="{faq5: false}">
                                        {{-- faq 5 --}}
                                        <a class="d-block faq-wrapper mb-3" x-bind:class="faq5 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq5 = !faq5" data-toggle="collapse"
                                            href="#faqCollapse5" aria-expanded="false" aria-controls="faqCollapse5">
                                            <div class="d-flex align-items-center" >
                                                <div class="mr-3 font-weight-bold">Q5:</div>
                                                <div class="flex-grow-1 text-left">ユーザーIDがわかりません。どうすれば良いですか？</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq5 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq5 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse5">
                                            <div class="faq-child text-left">
                                                <p>ユーザIDは、会員登録した際に発行されるユーザID（登録時のメールアドレス）と同一です。<br>
                                                    メールアドレスがご不明な場合は、お手数ですが以下より再度ご登録をお願いします。<br>
                                                    URL：○○</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer" x-data="{faq6: false}">
                                        {{-- faq 6 --}}
                                        <a class="d-block faq-wrapper mb-3" x-bind:class="faq6 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq6 = !faq6" data-toggle="collapse"
                                            href="#faqCollapse6" aria-expanded="false" aria-controls="faqCollapse6">
                                            <div class="d-flex align-items-center" >
                                                <div class="mr-3 font-weight-bold">Q6:</div>
                                                <div class="flex-grow-1 text-left">パスワードを忘れてログインできません。どうすれば良いですか？</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq6 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq6 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse6">
                                            <div class="faq-child text-left">
                                                <p>パスワードが不明な場合は以下より再設定の手続きををお願いします。<br>
                                                    URL：○○</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer" x-data="{faq7: false}">
                                        {{-- faq 7 --}}
                                        <a class="d-block faq-wrapper mb-0" x-bind:class="faq7 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq7 = !faq7" data-toggle="collapse"
                                            href="#faqCollapse7" aria-expanded="false" aria-controls="faqCollapse7">
                                            <div class="d-flex align-items-center" >
                                                <div class="mr-3 font-weight-bold">Q7:</div>
                                                <div class="flex-grow-1 text-left">何度やってもログインできない場合はどうすれば良いですか？</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq7 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq7 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse7">
                                            <div class="faq-child text-left">
                                                <p>いくつかの理由が考えられます。<br>
                                                    ・ユーザIDは、半角のアルファベット、数字、アンダーバー「 _ 」で入力してください。全角文字ではログインできません。<br>
                                                    ・パスワードは、大文字と小文字が正しく入力されている必要があります。<br>
                                                    ・パスワードに使えるのは、半角のアルファベット、数字、記号のみです。全角文字ではログインできません。<br>
                                                </p>
                                                <br>
                                                <p>
                                                    それでもログインできない場合は、弊社にてお調べいたしますので、お手数ですが、下記よりお問い合わせください。<br>
                                                    URL：○○
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- 登録情報の変更について --}}
                                <div class="col-12">
                                    <h3 class="third-title faq-category text-left">
                                        登録情報の変更について
                                    </h3>
                                </div>
                                <div class="col-12">
                                    <div class="cursor-pointer" x-data="{faq8: false}">
                                        {{-- faq 7 --}}
                                        <a class="d-block faq-wrapper mb-3" x-bind:class="faq8 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq8 = !faq8" data-toggle="collapse"
                                            href="#faqCollapse8" aria-expanded="false" aria-controls="faqCollapse8">
                                            <div class="d-flex align-items-center" >
                                                <div class="mr-3 font-weight-bold">Q8:</div>
                                                <div class="flex-grow-1 text-left">登録している会員情報を変更したいです。どこから変更したらいいですか？</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq8 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq8 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse8">
                                            <div class="faq-child text-left">
                                                <p>会員登録情報の変更は、マイページ内の「各種設定」より行っていただけます。</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer" x-data="{faq9: false}">
                                        {{-- faq 9 --}}
                                        <a class="d-block faq-wrapper mb-3" x-bind:class="faq9 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq9 = !faq9" data-toggle="collapse"
                                            href="#faqCollapse9" aria-expanded="false" aria-controls="faqCollapse9">
                                            <div class="d-flex align-items-center" >
                                                <div class="mr-3 font-weight-bold">Q9:</div>
                                                <div class="flex-grow-1 text-left">メールアドレスが変わりました。どこで変更したらいいですか？</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq9 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq9 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse9">
                                            <div class="faq-child text-left">
                                                <p>メールアドレスの変更は、マイページ各種設定内の、「メールアドレス変更」より行っていただけます。メールアドレス変更よりご変更ください。</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer" x-data="{faq10: false}">
                                        {{-- faq 10 --}}
                                        <a class="d-block faq-wrapper mb-3" x-bind:class="faq10 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq10 = !faq10" data-toggle="collapse"
                                            href="#faqCollapse10" aria-expanded="false" aria-controls="faqCollapse10">
                                            <div class="d-flex align-items-center" >
                                                <div class="mr-3 font-weight-bold">Q10:</div>
                                                <div class="flex-grow-1 text-left">パスワードを変更できますか？</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq10 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq10 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse10">
                                            <div class="faq-child text-left">
                                                <p>ログイン後、マイページの「登録情報の編集」＞「パスワードの変更」ページより変更可能です。</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer" x-data="{faq11: false}">
                                        {{-- faq 11 --}}
                                        <a class="d-block faq-wrapper mb-3" x-bind:class="faq11 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq11 = !faq11" data-toggle="collapse"
                                            href="#faqCollapse11" aria-expanded="false" aria-controls="faqCollapse11">
                                            <div class="d-flex align-items-center" >
                                                <div class="mr-3 font-weight-bold">Q11:</div>
                                                <div class="flex-grow-1 text-left">会員情報を変更できますか？</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq11 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq11 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse11">
                                            <div class="faq-child text-left">
                                                <p>ログイン後にマイページの「会員情報変更」ページより変更可能です。</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer" x-data="{faq12: false}">
                                        {{-- faq 12 --}}
                                        <a class="d-block faq-wrapper mb-0" x-bind:class="faq12 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq12 = !faq12" data-toggle="collapse"
                                            href="#faqCollapse12" aria-expanded="false" aria-controls="faqCollapse12">
                                            <div class="d-flex align-items-center" >
                                                <div class="mr-3 font-weight-bold">Q12:</div>
                                                <div class="flex-grow-1 text-left">物件の希望条件を変更できますか？</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq12 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq12 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse12">
                                            <div class="faq-child text-left">
                                                <p>ログイン後にマイページの「物件希望条件」ページより変更可能です。</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- 退会について --}}
                                <div class="col-12">
                                    <h3 class="third-title faq-category text-left">
                                        退会について
                                    </h3>
                                </div>
                                <div class="col-12">
                                    <div class="cursor-pointer" x-data="{faq13: false}">
                                        {{-- faq 13 --}}
                                        <a class="d-block faq-wrapper mb-3" x-bind:class="faq13 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq13 = !faq13" data-toggle="collapse"
                                            href="#faqCollapse13" aria-expanded="false" aria-controls="faqCollapse13">
                                            <div class="d-flex align-items-center" >
                                                <div class="mr-3 font-weight-bold">Q13:</div>
                                                <div class="flex-grow-1 text-left">退会するにはどうしたらいいですか？</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq13 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq13 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse13">
                                            <div class="faq-child text-left">
                                                <p>マイページの「退会」ページより行うことができます。退会された場合、ご利用いただいた情報がご利用不可になりますのでご注意ください。</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer" x-data="{faq14: false}">
                                        {{-- faq 14 --}}
                                        <a class="d-block faq-wrapper mb-0" x-bind:class="faq14 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq14 = !faq14" data-toggle="collapse"
                                            href="#faqCollapse14" aria-expanded="false" aria-controls="faqCollapse14">
                                            <div class="d-flex align-items-center" >
                                                <div class="mr-3 font-weight-bold">Q14:</div>
                                                <div class="flex-grow-1 text-left">退会後、再度会員登録をすることはできますか？</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq14 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq14 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse14">
                                            <div class="faq-child text-left">
                                                <p>退会後、再度同一メールアドレスで会員登録も可能です。ただし、退会前の情報を引き継ぐことはできません。</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- その他 --}}
                                <div class="col-12">
                                    <h3 class="third-title faq-category text-left">
                                        その他
                                    </h3>
                                </div>
                                <div class="col-12">
                                    <div class="cursor-pointer" x-data="{faq15: false}">
                                        {{-- faq 15 --}}
                                        <a class="d-block faq-wrapper mb-3" x-bind:class="faq15 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq15 = !faq15" data-toggle="collapse"
                                            href="#faqCollapse15" aria-expanded="false" aria-controls="faqCollapse15">
                                            <div class="d-flex align-items-center" >
                                                <div class="mr-3 font-weight-bold">Q15:</div>
                                                <div class="flex-grow-1 text-left">不動産オーナー、不動産会社で、物件の登録をしたいのですが、どうすればよいですか？</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq15 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq15 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse15">
                                            <div class="faq-child text-left">
                                                <p>お問い合わせページより、お問い合わせ下さい。<br>
                                                    URL：○○</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer" x-data="{faq16: false}">
                                        {{-- faq 16 --}}
                                        <a class="d-block faq-wrapper mb-3" x-bind:class="faq16 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq16 = !faq16" data-toggle="collapse"
                                            href="#faqCollapse16" aria-expanded="false" aria-controls="faqCollapse16">
                                            <div class="d-flex align-items-center" >
                                                <div class="mr-3 font-weight-bold">Q16:</div>
                                                <div class="flex-grow-1 text-left"> 携帯電話（ガラケー/フィーチャーフォン）でも利用できますか？</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq16 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq16 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse16">
                                            <div class="faq-child text-left">
                                                <p>携帯電話（ガラケー/フィーチャーフォン）では利用できかねます。</p>
                                                <br>
                                                <p>
                                                    また下記の環境を推奨いたします。<br>
                                                    ■PC：OSとブラウザについて<br>
                                                    【Windows】<br>
                                                    OS：Windows 7 / Windows 8 / Windows 10 /Windows 11<br>
                                                    ブラウザ：Internet Explorer 最新版 / Microsoft Edge 最新版 / Firefox 最新版 / Chrome 最新版<br>
                                                    【Mac】<br>
                                                    OS：macOS 10.10(Yosemite)以降<br>
                                                    ブラウザ：Safari最新版 / Firefox最新版 / Chrome 最新版
                                                </p>
                                                <br>
                                                <p>
                                                    ■スマートフォン／タブレット：OSとブラウザについて<br>
                                                    【iPhone・iPad】<br>
                                                    OS：iOS 13 以上<br>
                                                    ブラウザ：Safari / Chrome 最新版<br>
                                                    【Android】<br>
                                                    OS：Android 5 以上<br>
                                                    ブラウザ：Chrome 最新版
                                                </p>
                                                <br>
                                                <p>
                                                    ■JavaScript<br>
                                                    当サイトではJavaScriptを使用しております。JavaScriptが「有効」になっていることをご確認ください。
                                                </p>
                                                <br>
                                                <p>
                                                    ■Cookie（クッキー）<br>
                                                    当サイトではCookieを使用しております。Cookieを受け入れる（有効にする）設定になっていることをご確認ください。
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer" x-data="{faq17: false}">
                                        {{-- faq 17 --}}
                                        <a class="d-block faq-wrapper mb-0" x-bind:class="faq17 ? 'text-white bg-green-primary' : '' "
                                            role="button" x-on:click="faq17 = !faq17" data-toggle="collapse"
                                            href="#faqCollapse17" aria-expanded="false" aria-controls="faqCollapse17">
                                            <div class="d-flex align-items-center" >
                                                <div class="mr-3 font-weight-bold">Q17:</div>
                                                <div class="flex-grow-1 text-left">「たべるば」の運営会社を教えてください。</div>
                                                <div>
                                                    <img class="faq-btn" x-bind:class="!faq17 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-plus.svg')}}" alt="icon-plus">
                                                    <img class="faq-btn" x-bind:class="faq17 ? 'd-block' : 'd-none' " src="{{asset('assets/img/icon-minus.svg')}}" alt="icon-minus">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="collapse" id="faqCollapse17">
                                            <div class="faq-child text-left">
                                                <p>「たべるば」は株式会社トラストワンが管理・運営しています。株式会社トラストワンについては、以下よりご確認ください。<br>
                                                    ⇒運営会社HP</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row justify-content-center wrapper-btn-contact">
                            <div class="col-12 px-lg-0">
                                <a href="#" class="btn btn-secondary d-flex align-items-center justify-content-center text-center btn-about rounded-pill content-btn border-0">
                                    <span>ホームへ戻る</span>
                                </a>
                            </div>
                        </div>


            </div>
        </div>
    </div>

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
