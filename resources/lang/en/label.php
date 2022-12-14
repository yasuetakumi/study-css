<?php

return [

    // success when data created
    'SUCCESS_CREATE_MESSAGE'     => 'Your entry has been successfully saved!', //'入力した内容を保存しました。',
    // failed when data created
    'FAILED_CREATE_MESSAGE'      => 'Sorry, we were unable to save your entry. Please check your entry and try again later', //'入力した内容を保存できませんでした。',
    // success when data updated
    'SUCCESS_UPDATE_MESSAGE'     => 'Your update has been successfully saved!', //'編集した内容を保存しました。',
    // failed when data updated
    'FAILED_UPDATE_MESSAGE'      => 'Sorry, we were unable to save your update. Please check your update and try again later', //'編集した内容を保存できませんでした。',
    // success when data deleted
    'SUCCESS_DELETE_MESSAGE'     => 'Data has been successfully deleted!', // '対象のデータを削除しました。',
    // failed when data deleted
    'FAILED_DELETE_MESSAGE'      => 'Sorry, the data could not be deleted', // '対象のデータを削除できませんでした。',
    // failed when logged in user data deleted
    'FAILED_DELETE_SELF_MESSAGE' => 'Sorry, we could not delete data of currently logged in person', // '現在ログインされている方のデータを削除できませんでした。',
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
    'login_form'             => 'Login Form',
    'language'               => 'Language',
    'top_page'               => 'TOP PAGE',
    'service_page'           => 'SERVICE PAGE',
    'logout'                 => 'LOG OUT',
    /** Login ============================= */
    'enterEmailAddress'      => 'Email',
    'enterPassword'          => 'Password',
    'remember'               => 'Remember Me',
    'login'                  => 'Login',
    'login_fail'             => 'Login Fail',
    'dashboard'              => 'Dashboard',
    'superAdmin'             => 'Super Admin',
    'admin'                  => 'Admin',
    'company'                => 'Company',
    'createNew'              => 'Create New',
    'list'                   => ' List',
    'add'                    => 'Add New ',
    'edit'                   => 'Edit ',
    'required'               => 'Required',
    'optional'               => 'Optional',
    'update'                 => 'Update',
    'password'               => 'Password',
    'showPassword'           => 'Show Password',
    'change'                 => 'Change',
    'register'               => 'Register',
    'search'                 => 'Search',
    'all'                    => 'All',
    'adminloginscreen'       => 'Administration Login',
    'newPassword'            => 'Enter new password to update your old password',
    'choosePasswordLength'   => 'Please choose a password with a minimum length of 8 characters.',
    'updatePasswordSentence' => 'Click change button when you wish to update your password.',
    'jsConfirmDeleteData'    => 'Are you sure you want to delete this data?',
    'jsInfoDeletedData'      => 'Data has been successfully deleted!',
    'jsSorry'                => 'Sorry, the data could not be deleted',
    'user'                   => 'User',
    'userloginscreen'        => 'User Login',
    'close'                  => 'Close',
    /** =================================== */
    'name'                   => 'Name',
    'email'                  => 'Email',
    'admin_role_id'          => 'Admin role id',
    'user_role'              => 'User role',
    'email_verified_at'      => 'Email verified at',
    'post_code'              => 'Post Code',
    'address'                => 'Address',
    'phone'                  => 'Phone',
    'company_name'           => 'Company Name',
    'company_info'           => 'Company Info',
    /** =================================== */
    'created_at'             => 'Created at',
    'update_at'              => 'Updated at',
    'created_at_datetime'    => 'Created at',
    'updated_at_datetime'    => 'Updated at',
    'action'                 => 'Action',
    /** Login History====================== */
    'historyLog'             => 'Log Activity',
    'admin_id'               => 'Admin ID',
    'activity'               => 'Activity',
    'detail'                 => 'Detail',
    'ip'                     => 'IP Address',
    'last_access'            => 'Last Access',
    'IForgotMyPassword'      => 'I forgot my password',
    /** News====================== */
    'news'                  => 'News',
    'Feature'               => 'Sample Feature',
    'title'                 => 'Title',
    'body'                  => 'Body', // Content textarea, not human body
    'image'                 => 'Image',
    'publish_date'          => 'Publish Date',
    'status'                => 'Status',
    'last_update'           => 'Last Update',
    'pdf_file'               => 'PDF File',
    'radius'                 => 'Radius',
    /** Log Acitivity====================== */
    'log'                   => 'ログ',
    'log_activity'          => 'Log Activity ',
    'access_time'           => 'Access Time',
    'features_label'        => 'Features',
    'thumbnail'             => '(Thumbnail of list)',
    'video'                 => 'Video',


    'empty_value'           => ' ',
    'detail_page'           => '[Draft] Detail Page',
    'submit'                => 'Submit',
    'browsing_history'      => 'History',
    'favorite_property'     => 'Favorite',

    // Sidebar
    'real_estate_company_employee' => 'Real Estate Company Employee',
    'operation_history' => 'Operation History',
    'wish_open_store' => 'Open a Store',

    // A2
    'members' => 'Members',
    'member_name' => 'Name',
    'line_id' => 'Line ID',
    'social_login' => 'Social Login',

    // A3
    'name_furigana' => 'Name furigana',
    'name_kana' => 'Name kana',
    'line_linkage_status' => 'Line Linkage status',
    'linked_line_id' => 'Linked Line ID',
    'line_qr_or_link' => 'QR code or url to link to LINE',
    'line_notif_settings' => 'Line Notification Settings',
    'email_notif_settings' => 'Email Notification Settings',
    'linked' => 'Linked',
    'cancel_sns' => 'Cancel Certifcation SNS',
    'cancel_sns_confirm' => 'Are you sure you want to cancel the certification of SNS?',
    'phone_validation' => 'The :attribute must be less than 11 digit without hyphens.',

    // A6
    'last_update_datetime' => 'Last Update',
    'company_id' => 'Company ID',
    'company_name' => 'Company Name',
    'approval_status' => 'Approval Status',
    'pending' => 'Unapproved',
    'active' => 'Enabled (Approved)',
    'block' => 'Invalid (Denied)',
    'real_estate_company' => 'Real Estate Company',

    // A13 / A14 Property Form
    'property_editing' => 'Property Editing',
    'new_property_create' => 'New Property Create',
    'nearest_station' => 'Nearest Station',
    'select_station' => 'Select Station',
    'station_line' => 'Station Line',
    'stations_belong_to_station_line' => 'Stations Belong to Station Line',
    'selected_stations' => 'Selected Stations',
    'clear_btn' => 'Clear',
    'close_btn' => 'Close',
    'walk_from_nearest_station' => 'Walking Distance from Nearest Station',
    'publication_status' => 'Publication Status',
    'see_property_detail' => 'See the detail page that already published',

    //A16
    'company_approval_list' => 'Company Approval List',

    //A17
    'approve_company' => 'Approve this company',

    //C1
    'walking_distance_from_station' => 'Walking Distance From Station',
    'property_preference' => 'Property Preference',
    'property_types' => 'Property Types',
    'cuisines' => 'Cuisines',
    'transfer_price_option' => 'Transfer Price Option',

    //C2
    'recently_view_property' => 'Recently Viewed Property',
    'view_favorite_property' => 'View Favorite Property',
    'search_condition' => 'Search Conditions',
    'clear_search_condition' => 'Clear Search Conditions',
    'with_the_current_search_condition' => 'With the current search conditions',
    'save_search_history' => 'Save',
    'register_new_email' => 'Register a new mail',
    'search_with_these_search_condition' => 'Search with these search conditions',

    //D1 PROPERTY
    'plans' => 'Plans',
    'property' => 'Property',
    'property_list' => 'Property List',
    'real_estate_agent_in_charge' => 'Real Estate Agent In Charge',
    'real_estate_agency' => 'Real Estate Agency',
    'postcode' => 'Postcode',
    'prefecture' => 'Prefecture',
    'cities' => 'Cities',
    'location' => 'Location(remaining parts of the address)',
    'surface_area' => 'Surface Area',
    'surface_area_meter' => 'Surface Area(Meters)',
    'surface_area_tsubo' => 'Surface Area(Tsubo)',
    'rent_amount' => 'Rent Amount',
    'rent_cost_yen_per_tsubo' => 'Cost of Rent (Yen) per Tsubo',
    'rent_amount_man' => 'Rent amount(Man)',
    'number_of_floor_underground' => 'Number of Floors underground',
    'number_of_floor_aboveground' => 'Number of Floors aboveground',
    'restaurant_type' => 'Restaurant Type',
    'structure' => 'Structure',
    'deposit' => 'Deposit',
    'monthly_maintaner' => 'Monthly Maintenance Fee',
    'repayment_conditions' => 'Repayment Conditions',
    'year_built' => 'Year Built',
    'renewal_fee' => 'Renewal Fee',
    'contract_length' => 'Contract Length in Months',
    'moving_fee' => 'Moving Fee',
    'business_terms' => 'Business Terms',
    'comments' => 'Comments',
    'is_skeleton' => 'Skeleton/Furnished',
    'restaurant_cuisine' => 'Restaurant Cuisine',
    'interior_transfer_price' => 'Interior Transfer Price',

    // Customer Inquiry
    'customer_inquiry' => 'Customer Inquiry',
    'property_id' => 'Property ID',
    'contact_us_type' => 'Contact Us Type',
    'subject' => 'Subject',
    'text' => 'Text',
    'flag' => 'Flag',
    'name_inquiry' => 'Name',
    'email_inquiry' => 'Email',
    'is_finish' => 'Is Finish',
    'person_in_charge' => 'Person In Charge',
    'note' => 'Note',
    'company_name' => 'Company Name',
    'content_inquiry' => 'Content of Inquiry',
    'inquiry_button' => 'Inquiry Button',
    'inquiry_type' => 'Inquiry Type',
    'inquiry_name' => 'Name',
    'phone_number' => 'Phone Number',

    //B2
    'my_account' => 'My Account',

    //B3
    'administrator' => 'Administrator',

    //B7
    'inquiry_created_at' => 'Created At',
    'inquiry_updated_at' => 'Updated At',

    //B8
    'edit_company_payment_details' => 'Edit Company Payment Detail',
    'remaining_points' => 'Remaining Points',
    'subscription_plan' => 'Subscription Plan',
    'card_number' => 'Card Number',
    'security_number' => 'Security Number',
    'card_holder_name' => 'Card Holder Name',
    'card_brand' => 'Card Brand',
    'expiry_year' => 'Expiry Year',
    'expiry_month' => 'Expiry Month',
    'expiry_date_subscription' => 'Expiry date of subscription plan',
    'register_details' => 'Register Details',
    'time_of_payment' => 'Time of Payment Detail Registration',
    'time_of_updating' => 'Time of Updating Registration Details',
    'points_to_charge' => 'Points to Charge',
    'costs_of_points' => 'Costs of Points',
    'buy_points' => 'Buy Points',
    'charge_points' => 'Charge Points',

    // B21
    'in_charge_id' => 'In Charge ID',
    'in_charge_name' => 'In Charge Name',

    // C5
    'underground' => 'Underground',

    //C15
    'postcode_notfound'     => 'Zip code not found',

    //C4
    'thumbnail_image_main' => 'Thumbnail Image Main',
    'thumbnail_image' => 'Thumbnail Image',
    'image' => 'Image',
    'image_360' => 'Image 360',
    'skeleton' => 'Skeleton',
    'furnished' => 'Furnished',
    'design_categories' => 'Design Categories',
    'desgin_styles' => 'Design Styles',
    'send_inquiry' => 'Send Inquiry',
    'property_detail' => 'Property Detail',

    //C6
    'property_history' => '物件閲覧履歴・お気に入り',

    //C-Common-6
    'no_condition_saved' => 'No Search Condition Saved',

    //C18
    'member_registration' => 'Member Registration',
    'member_registration_confirm' => 'Confirm Registration Information',
    'to_confirmation_page' => 'To confirmation page',
    'term_of_use' => 'I consent to the Terms of Use',
    'privacy_policy' => 'I consent to the Privacy Policy',
    'agree_with_terms' => 'I agree with the Terms & Conditions',

    //C25
    'member_mypage' => 'Member Mypage',
];
