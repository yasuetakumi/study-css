@php
    $isApproval = Route::currentRouteName() == 'admin.approval.show';
@endphp
@extends('backend._base.content_form')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('top_buttons')
    @if(!$isApproval)
        @if ($page_type == "create")
            <a href="{{route('admin.company.index')}}" class="btn btn-secondary float-sm-right">@lang('label.list')</a>
        @else
            {{-- Create company : ONLY SHOW for super_admin or admin --}}
            @if(Auth::user()->has_permit_edit_company )
                <a href="{{route('admin.company.create')}}" class="btn btn-secondary float-sm-right">@lang('label.createNew')</a>
            @endif
            @if (Auth::user()->adminRole)
                <a href="{{route('admin.company.index')}}" class="btn btn-secondary float-sm-right">@lang('label.list')</a>
            @endif
        @endif
    @endif
@endsection

@section('content')
    @component('backend._components.form_container', ["action" => $form_action, "page_type" => $page_type, "files" => false])
        @if(!Auth::guard('user')->check())
            @component('backend._components.input_text', ['name' => 'display_name', 'label' => __('label.name'), 'required' => 1, 'value' => $item->admin->display_name, 'isReadOnly' => $isApproval]) @endcomponent
            @component('backend._components.input_email', ['name' => 'email', 'label' => __('label.email'), 'required' => 1, 'value' => $item->admin->email, 'isReadOnly' => $isApproval]) @endcomponent
            @if(!$isApproval)
                @if ($page_type == "create")
                    @component('backend._components.input_password') @endcomponent
                @else
                    @component('backend._components.input_password_edit') @endcomponent
                @endif
            @endif
        @endif

        @component('backend._components.input_text', ['name' => 'company_name', 'label' => __('label.company_name'), 'required' => 1, 'value' => $item->company_name, 'isReadOnly' => $isApproval]) @endcomponent
        @component('backend._components.input_postcode', ['name' => 'post_code', 'label' => __('label.post_code'), 'required' => 1, 'value' => $item->post_code, 'isReadOnly' => $isApproval]) @endcomponent
        @component('backend._components.input_text', ['name' => 'address', 'label' => __('label.address'), 'required' => 1, 'value' => $item->address, 'isReadOnly' => $isApproval]) @endcomponent
        @component('backend._components.input_text', ['name' => 'phone', 'label' => __('label.phone'), 'required' => 1, 'value' => $item->phone, 'isReadOnly' => $isApproval]) @endcomponent
        @if(!Auth::guard('user')->check())
            @component('backend._components.input_radio', ['name' => 'status', 'options' => ['pending', 'active', 'block'], 'label' => __('label.status'), 'required' => 1, 'value' => $item->status, 'isDisabled' => $isApproval]) @endcomponent
        @endif
        @if($isApproval)
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-secondary" id="input-submit">
                    <i class="fas fa-save"></i> @lang('label.approve_company')
                </button>
            </div>
        @else
            @component('backend._components.input_buttons', ['page_type' => $page_type])@endcomponent
        @endif

    @endcomponent
@endsection
