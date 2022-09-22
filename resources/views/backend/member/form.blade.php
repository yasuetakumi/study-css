@extends('backend._base.content_form')
@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.member.index')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('content')
    @component('backend._components.form_container', ["action" => $form_action, "page_type" => $page_type, "files" => false])
        @component('backend._components.input_text', ['name' => 'company_name', 'label' => __('label.company_name'), 'required' => 0, 'value' => $item->company_name ?? '']) @endcomponent
        @component('backend._components.input_text', ['name' => 'name', 'label' => __('label.name'), 'required' => 1, 'value' => $item->name ?? '']) @endcomponent
        @component('backend._components.input_text', ['name' => 'name_furigana', 'label' => __('label.name_furigana'), 'required' => 0, 'value' => $item->name_furigana ?? '', 'onlyjapanese' => true]) @endcomponent
        @component('backend._components.input_text', ['name' => 'name_kana', 'label' => __('label.name_kana'), 'required' => 0, 'value' => $item->name_kana ?? '', 'onlykatana' => true]) @endcomponent
        @component('backend._components.input_number', ['name' => 'phone_number', 'label' => __('label.phone'), 'required' => 0, 'value' => $item->phone_number ?? '']) @endcomponent
        @component('backend._components.input_email', ['name' => 'email', 'label' => __('label.email'), 'required' => 1, 'value' => $item->email ?? '']) @endcomponent

        @if ($page_type == "create")
            @component('backend._components.input_password') @endcomponent
        @else
            @component('backend._components.input_password_edit') @endcomponent
        @endif

        @component('backend._components.input_radio', ['is_indexed_value' => true, 'options' => $publication_statuses, 'name' => 'is_line_notification_enabled', 'label' => __('label.publication_status'), 'value' => $item->publication_status_id ?? '', 'required' => false])
        @endcomponent
        @component('backend._components.input_radio', ['is_indexed_value' => true, 'options' => $publication_statuses, 'name' => 'is_email_notification_enabled', 'label' => __('label.publication_status'), 'value' => $item->publication_status_id ?? '', 'required' => false])
        @endcomponent

        @component('backend._components.input_buttons', ['page_type' => $page_type])@endcomponent
    @endcomponent
@endsection
