@extends('backend._base.content_form')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.company.index')}}">@lang('label.company')</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.company.user.index', $parent_company_id)}}">@lang('label.list')</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('top_buttons')
    @if ($page_type == "create")
        <a href="{{route('admin.company.user.index', $parent_company_id)}}" class="btn btn-secondary float-sm-right">@lang('label.list')</a>
    @else
        <a href="{{route('admin.company.user.create', $parent_company_id)}}" class="btn btn-secondary float-sm-right">@lang('label.createNew')</a>
        <a href="{{route('admin.company.user.index', $parent_company_id)}}" class="btn btn-secondary float-sm-right">@lang('label.list')</a>
    @endif
@endsection

@section('content')
    @component('backend._components.form_container', ["action" => $form_action, "page_type" => $page_type, "files" => false])
        @component('backend._components.input_text', ['name' => 'display_name', 'label' => __('label.name'), 'required' => 1, 'value' => $item->display_name]) @endcomponent
        @component('backend._components.input_email', ['name' => 'email', 'label' => __('label.email'), 'required' => 1, 'value' => $item->email]) @endcomponent
        @component('backend._components.input_select', ['name' => 'user_role_id', 'options' => $user_roles, 'label' => __('label.user_role'), 'required' => 1, 'value' => $item->user_role_id]) @endcomponent

        @if ($page_type == "create")
            @component('backend._components.input_password') @endcomponent
        @else
            @component('backend._components.input_password_edit') @endcomponent
        @endif

        @component('backend._components.input_buttons', ['page_type' => $page_type])@endcomponent
    @endcomponent
@endsection
