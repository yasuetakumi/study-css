<?php

return [

    // success when data created
    'SUCCESS_CREATE_MESSAGE'     => '入力した内容を保存しました。',
    // failed when data created
    'FAILED_CREATE_MESSAGE'      => '入力した内容を保存できませんでした。',
    // success when data updated
    'SUCCESS_UPDATE_MESSAGE'     => '編集した内容を保存しました。',
    // failed when data updated
    'FAILED_UPDATE_MESSAGE'      => '編集した内容を保存できませんでした。',
    // success when data deleted
    'SUCCESS_DELETE_MESSAGE'     => '対象のデータを削除しました。',
    // failed when data deleted
    'FAILED_DELETE_MESSAGE'      => '対象のデータを削除できませんでした。',
    // failed when logged in user data deleted
    'FAILED_DELETE_SELF_MESSAGE' => '現在ログインされている方のデータを削除できませんでした。',
    /*
    |--------------------------------------------------------------------------
    | language Label for dashboard
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during dashboard for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    // common words
    /** Top bar =========================== */
    'login_form'             => 'ログインフォーム',
    'language'               => '言語',
    'top_page'               => 'トップページ',
    'logout'                 => 'ログアウト',
    /** Login ============================= */
    'enterEmailAddress'      => 'メールアドレス',
    'enterPassword'          => 'パスワード',
    'remember'               => 'ログイン状態を保持する',
    'login'                  => 'ログイン',
    'login_fail'             => 'ログイン失敗',
    'dashboard'              => 'ダッシュボード',
    'superAdmin'             => '特権管理者',
    'admin'                  => '管理者',
    'company'                => '会社',
    'createNew'              => '新規作成',
    'list'                   => '一覧',
    'add'                    => '新規作成',
    'edit'                   => '編集',
    'required'               => '必須',
    'optional'               => '任意',
    'update'                 => '更新',
    'password'               => 'パスワード',
    'showPassword'           => 'パスワードを表示',
    'change'                 => '変更',
    'register'               => '登録',
    'search'                 => '検索',
    'all'                    => '全部',
    'adminloginscreen'       => '管理者ログイン画面',
    'newPassword'            => '新しいパスワードを入力してください',
    'choosePasswordLength'   => '8文字以上のパスワードを入力してください。',
    'updatePasswordSentence' => 'パスワードを更新したい場合は、変更ボタンを選択してください。',
    'jsConfirmDeleteData'    => 'このデータを削除しますか？',
    'jsInfoDeletedData'      => 'データが削除されました！',
    'jsSorry'                => 'データの削除は失敗しました。',
    'user'                   => 'ユーザー',
    'userloginscreen'        => 'ユーザーログイン',
    /** =================================== */
    'name'                   => 'お名前',
    'email'                  => 'メールアドレス',
    'admin_role_id'          => '管理者ロールID',
    'user_role'              => 'ユーザーロール',
    'email_verified_at'      => 'メール確認済み日',
    'post_code'              => '郵便番号',
    'address'                => '住所',
    'phone'                  => '電話番号',
    'company_name'           => '会社名',
    'company_info'           => '会社情報',
    /** =================================== */
    'created_at'             => '作成日',
    'update_at'              => '更新日',
    'action'                 => '編集',
    /** Login History====================== */
    'historyLog'             => '管理者ログイン履歴',
    'admin_id'               => '管理者ID',
    'activity'               => 'アクティビティ',
    'detail'                 => '詳細',
    'ip'                     => 'IPアドレス',
    'last_access'            => '最終アクセス',
    'IForgotMyPassword'      => 'パスワードをお忘れの方',
    /** News====================== */
    'news'                  => 'ニュース',
    'Feature'               => 'サンプル機能',
    'title'                 => 'タイトル',
    'body'                  => '内容',
    'image'                 => '画像',
    'publish_date'          => '発行日',
    'status'                => 'ステータス',
    'last_update'           => '最終更新日',
    'pdf_file'               => 'PDFファイル',
    'radius'                 => '半径',
    /** Log Acitivity====================== */
    'log'                   => 'ログ',
    'log_activity'          => 'アクティビティログ',
    'access_time'           => '実行日時',
    'features_label'        => '機能',
    'thumbnail'             => '(一覧のサムネイル)',
    'video'                 => '動画',

    'empty_value'           => ' ',
    'detail_page'           => '[Draft] Detail Page',

    //C1
    'walking_distance_from_station' => '徒歩',
    'property_preference' => 'こだわり条件',
    'property_types' => '飲食店の種類',
    'cuisines' => '業態',
    'transfer_price_option' => '譲渡額',

    //C2
    'recently_view_property' => '最新の閲覧履歴',
    'view_favorite_property' => 'お気に入り一覧を見る',

    //D1 Property
    'property' => '物件の一覧',
    'property_list' => '物件の一覧',
    'real_estate_agent_in_charge' => '取引会社の管理者',
    'real_estate_agency' => '取引会社',
    'postcode' => '郵便番号',
    'prefecture' => '都道府県',
    'cities' => '市町村区',
    'location' => '住所',
    'surface_area' => '面積',
    'surface_area_meter' => '面積（㎡）',
    'surface_area_tsubo' => '面積（坪）',
    'rent_amount' => '賃料',
    'cost_of_rent' => '坪単価(万／坪)',
    'rent_amount_man' => '家賃（万）',
    'number_of_floor_underground' => '階数(地下)',
    'number_of_floor_aboveground' => '階数(地上)',
    'restaurant_type' => '飲食店の種類',
    'structure' => '構造',
    'deposit' => '保証金または敷金',
    'monthly_maintaner' => '権利金または礼金',
    'repayment_conditions' => '解約時の償却情報',
    'year_built' => '築年',
    'renewal_fee' => '更新料',
    'contract_length' => '契約期間',
    'moving_fee' => '造作譲渡料',
    'business_terms' => '取引態様',
    'comments' => '備考',
    'skeleton' => 'スケルトン物件・居抜き物件',
    'restaurant_cuisine' => '業態',
    'interior_transfer_price' => '居抜き譲渡額',

    // Customer Inquiry
    'property_id' => '物件ID',
    'contact_us_type' => '問い合わせの種別',
    'subject' => '件名',
    'text' => 'テキスト',
    'flag' => 'フラグ',
    'name_inquiry' => '名前',
    'email_inquiry' => 'メール',
    'is_finish' => '返答済',
    'person_in_charge' => '管理者',
    'note' => 'メモ',
    'company_name' => '会社名',
    'content_inquiry' => 'お問い合わせ内容',
    'inquiry_button' => 'お問い合わせボタン',
    'inquiry_type' => 'お問い合わせ種別',
    'inquiry_name' => '氏名',

    //B2
    'my_account' => 'マイアカウント',

    //B3
    'administrator' => '管理者',

    // C5
    'underground' => '地下',
];
