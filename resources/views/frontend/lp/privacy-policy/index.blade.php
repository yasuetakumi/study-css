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
                        <li class="breadcrumb-item"><a href="">プライバシーポリシー</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


{{-- content --}}
<div id="contact-content" class=" mb-5 privacy-policy-page ">
    <div class="section-wrapper faq-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-7 col-md-10 col-sm-10 content-title">
                            <div class="page-header">
                                <p class="heading-title text-uppercase">PRIVACY POLICE</p>
                                <h2 class="sub-title ff-base font-weight-bold">プライバシーポリシー</h2>
                            </div>
                        </div>

                        {{-- privacy policy --}}
                        <div class="section-wrapper advantage-content page-body privacy-policy-color privacy-line-height">
                            <div class="container">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-10 mx-auto px-0">
                                    <div class="text-left">
                                            <p>株式会社トラストワン（以下、当社）は、当社が取得した個人情報の取扱いに関し、個人情報の保護に関する法律、個人情報保護に関するガイドライン等の指針、その他個人情報保護に関する関係法令を遵守します。</p>
                                            <h2 class="third-title faq-category">
                                                個人情報の安全管理
                                            </h2>
                                            <p>当社は、個人情報の保護に関して、組織的、物理的、人的、技術的に適切な対策を実施し、当社の取り扱う個人情報の漏えい、滅失又はき損の防止その他の個人情報の安全管理のために必要かつ適切な措置を講ずるものとします。</p>
                                            <h2 class="third-title faq-category">
                                                個人情報の取得等の遵守事項
                                            </h2>
                                            <div>
                                                <p class="mb-4">当社による個人情報の取得、利用、提供については、以下の事項を遵守します。</p>

                                                <ol class="sub-list ml-5">
                                                  <li class="sub-numbering-list delete-marker">
                                                    <b>個人情報の取得</b>
                                                    <p>本サービスにおいて当社が収集する利用者情報は、その収集方法に応じて、以下のようなものとなります。</p>
                                                    <ol class="sub-list">
                                                        <li class="circle-numbering mb-4 delete-marker">
                                                            お客様からご提供いただく情報<br>
                                                            <p class="policy-content-list">本サービスを利用するために、お客様からご提供いただく情報は以下のとおりです。</p>
                                                            <ul class="ml-3 list-disc">
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
                                                        <li class="circle-numbering mb-4 delete-marker">
                                                            お客様が本サービスの利用において、他のサービスと連携を許可することにより、当該他のサービスから提供される情報<p class="mt-4">お客様が、本サービスを利用するにあたり、ソーシャルネットワークサービス等の外部サービスとの連携を許可した場合には、その許可の際に連携を許可した外部サービスから提供された情報を収集することがあります。これには以下の情報が含まれます。<br>当該外部サービスでお客様が利用するID等の識別情報。<br>その他当該外部サービスのプライバシー設定によりお客様が連携先に開示を認めた情報。</p>
                                                        </li>
                                                        <li class=" circle-numbering mb-4 delete-marker">
                                                            お客様が本サービスを利用するにあたって、当社が収集する情報
                                                            <ul class="mt-01 ml-3 list-disc">
                                                              <li class="mt-4">当社は、本サービスへのアクセス状況やそのご利用方法に関する情報を収集することがあります。これには以下の情報が含まれます。</li>
                                                              <li>契約者・端末固有ID（OSが生成するID（Android ID）、独自端末識別番号（UDID）、加入者識別ID（IMSI）、端末識別ID（IMEI）、MACアドレス等</li>
                                                              <li>ログ情報</li>
                                                              <li>Cookie技術を用いて生成された識別情報</li>
                                                            </ul>
                                                        </li>
                                                    </ol>
                                                  </li>
                                                  <li class="sub-numbering-list delete-marker">
                                                    <b>個人情報の利用目的</b>
                                                    <ol class="sub-list ml-4">
                                                      <li class="circle-numbering mb-4 mt-4 delete-marker">
                                                        利用者情報は本条第2項に定めるとおり本サービスの提供のために利用されるほか、本条第3項に定めるとおり、その他の目的にも利用される場合があります。</li>
                                                      <li class="circle-numbering mb-4 delete-marker">本サービスのサービス提供にかかわる利用者情報の具体的な利用目的は以下のとおりです。
                                                          <ul class="ml-5 list-disc">
                                                              <li>本サイトの運営、維持、管理</li>
                                                              <li>本サイトを通じたサービスの提供及び紹介</li>
                                                              <li>本サイトの品質向上のためのアンケート</li>
                                                          </ul>
                                                      </li>
                                                      <li class="circle-numbering delete-marker">上記本条第2項以外の利用目的は以下のとおりです。
                                                          <ul class="ml-5 list-disc">
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

                                                  <h2 class="third-title faq-category">
                                                    個人情報の提供等
                                                </h2>
                                                  <p>当社は、法令で定める場合を除き、本人の同意に基づき取得した個人情報を、本人の事前の同意なく第三者に提供することはありません。なお、本人の求めによる個人情報の開示、訂正、追加若しくは削除又は利用目的の通知については、法令に従いこれを行うとともに、ご意見、ご相談に関して適切に対応します。</p>
                                                  <h2 class="third-title faq-category">
                                                    個人情報の利用目的の変更
                                                </h2>
                                                  <p>当社は、前項で特定した利用目的は、予め本人の同意を得た場合を除くほかは、原則として変更しません。但し、変更前の利用目的と相当の関連性を有すると合理的に認められる範囲において、予め変更後の利用目的を公表の上で変更を行う場合はこの限りではありません。</p>
                                                  <h2 class="third-title faq-category">
                                                    個人情報の第三者提供
                                                </h2>
                                                  <p>当社は、個人情報の取扱いの全部又は一部を第三者に委託する場合、その適格性を十分に審査し、その取扱いを委託された個人情報の安全管理が図られるよう、委託を受けた者に対する必要かつ適切な監督を行うこととします。</p>
                                                  <h2 class="third-title faq-category">
                                                    個人情報の訂正・削除・利用停止
                                                </h2>
                                                  <ol class="sub-list numbering">
                                                    <li>当社は、お客様から①個人情報が真実でないという理由によって個人情報保護法の定めに基づきその内容の訂正を求められた場合、及び②あらかじめ公表された利用目的の範囲を超えて取り扱われているという理由または偽りその他不正の手段により収集されたものであるという理由により、個人情報保護法の定めに基づきその利用の停止を求められた場合、③お客様に関する保有個人データが第三者提供の制限に関する個人情報保護法の定めに違反して第三者に提供されているという理由によって、第三者への提供の停止を求められた場合には、お客様ご本人からのご請求であることを確認の上で遅滞なく必要な調査を行い、その結果に基づき、個人情報の内容の訂正、利用停止、または第三者への提供の停止を行い、その旨をお客様に通知します。なお、合理的な理由に基づいて訂正利用停止、または第三者への提供の停止を行わない旨の決定をしたときは、お客様に対してその旨を通知いたします。</li>
                                                    <li>当社は、お客様から、お客様の個人情報について消去を求められた場合、当社が当該請求に応じる必要が有ると判断した場合は、お客様ご本人からのご請求であることを確認の上で、個人情報の消去を行い、その旨をお客様に通知します。</li>
                                                    <li>個人情報保護法その他の法令により、当社が訂正等又は利用停止等の義務を負わない場合は、前2項の規定は適用されません。</li>
                                                  </ol>
                                                  <h2 class="third-title faq-category">
                                                    個人情報の開示
                                                </h2>
                                                  <p>当社は、お客様から、個人情報保護法の定めに基づき個人情報の開示を求められたときは、お客様ご本人または正当な代理人からのご請求であることを当社所定の方法により確認した上で（本人確認書類のご提示をお願いする場合があります）、お客様に対し、遅滞なく開示を行います（当該個人情報が存在しないときにはその旨を通知いたします）。但し、個人情報保護法その他の法令により、当社が開示の義務を負わない場合は、この限りではありません。</p>
                                                  <h2 class="third-title faq-category">
                                                    事業の譲渡
                                                </h2>
                                                  <p>運営者は経営上、本サービスに関わる事業部門を譲渡する場合があります。その際お客様に関する情報は、通常、譲渡される事業資産とみなされますが、運営者はーに提供する本サービスを継続するため、またはその他の事業上の目的のために、ーの個人情報の全部・または一部を移転させることがあります。</p>
                                                  <h2 class="third-title faq-category">
                                                    事業者の氏名、個人情報保護管理者（若しくはその代理人）の氏名又は職名，所属及び連絡先
                                                </h2>
                                                  <p>事業者の氏名又は名称: 株式会社トラストワン<br>お問合せ先: 総務 高橋<br>0244-25-4412（受付時間 月〜金 9時〜17時 土日・祝祭日休業）</p>
                                                  <h2 class="third-title faq-category">
                                                    個人情報の開示、利用目的の通知、利用の停止、消去及び第三者への提供の停止／お問合わせ
                                                </h2>
                                                  <p>※個人情報の開示、利用目的の通知、利用の停止、消去及び第三者への提供の停止、その他個人情報の取扱いに関する苦情についても上記までお問合わせください。<br>お問合せ先: 総務 高橋<br>0244-25-4412（受付時間 月〜金 9時〜17時 土日・祝祭日休業）</p>
                                                  <h2 class="third-title faq-category">
                                                    改訂について
                                                </h2>
                                                  <p>当社は、保有する個人情報に関して適用される法令、規範を遵守すると共に、本プライバシーポリシーを必要に応じ見直し、改善に努めます。当社は、プライバシーポリシーを変更する場合があります。プライバシーポリシーに重要な変更がある場合には、サイト上で告知します。本ページを都度ご確認の上、当社のプライバシーポリシーをご理解いただくようお願いします。<br>なお、当社運営サイト上やメールマガジン等において、外部のサイトへのリンクが貼られることがあります。この外部のサイトで登録される個人情報は、当社で管轄する情報ではない為、一切の責任を負うことができません。外部サイトで個人情報を登録される場合は、そのサイトのプライバシーポリシーをご確認ください。</p>

                                                  <h2 class="third-title faq-category">
                                                    お問い合せ窓口
                                                </h2>
                                                  <p class="text-333">株式会社トラストワン 東京本社<br>住所: 〒102-0073<br>東京都千代田区九段北1-14-21
                                                    <br class="sp-only">九段アイレックスビル6F<br>TEL: 050-5807-2335 <br class="sp-only">FAX: 03-6228-3301<br>Email: info@tsubotan.net</p>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center wrapper-btn-contact">
                                <a href="#" class="btn btn-secondary d-flex align-items-center justify-content-center text-center btn-about rounded-pill content-btn border-0">
                                    <span>ホームへ戻る</span>
                                </a>
                        </div>
                    </div>
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
