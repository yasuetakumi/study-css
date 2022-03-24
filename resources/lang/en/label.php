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

    //A16
    'company_approval_list' => 'Company Approval List',

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
    'property' => 'Property',
    'property_list' => 'Property List',
    'real_estate_agent_in_charge' => 'Real Estate Agent In Charge',
    'real_estate_agency' => 'Real Estate Agency',
    'postcode' => 'Postcode',
    'prefecture' => 'Prefecture',
    'cities' => 'Cities',
    'location' => 'Location',
    'surface_area' => 'Surface Area',
    'surface_area_meter' => 'Surface Area(Meters)',
    'surface_area_tsubo' => 'Surface Area(Tsubo)',
    'rent_amount' => 'Rent Amount',
    'cost_of_rent' => 'Cost of Rent (Man) per Tsubo',
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
    'contract_length' => 'Contract Lenght in Months',
    'moving_fee' => 'Moving Fee',
    'business_terms' => 'Business Terms',
    'comments' => 'Comments',
    'skeleton' => 'Skeleton/Furnished',
    'restaurant_cuisine' => 'Restaurant Cuisine',
    'interior_transfer_price' => 'Interior Transfer Price',

    // Customer Inquiry
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
    'inquiry_name' => 'Inquiry Name',

    //B2
    'my_account' => 'My Account',

    //B3
    'administrator' => 'Administrator',

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

    // C5
    'underground' => 'Underground',

];
