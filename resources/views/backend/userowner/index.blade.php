@extends('backend._base.content_datatables')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        @if(Auth::user()->admin_role_id != \App\Models\AdminRole::ROLE_COMPANY_ADMIN)
            <li class="breadcrumb-item"><a href="{{route('admin.company.index')}}">@lang('label.company')</a></li>
        @endif
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

{{-- Company user create button : SUPER_ADMIN or own company can edit company-users --}}
@section('top_buttons')
    @if( Auth::user()->has_permit_edit_company || Auth::user()->id == $parent_company_id)
        <a href="{{route('admin.company.user.create', $parent_company_id)}}" class="btn btn-secondary">@lang(('label.createNew'))</a>
    @endif
@endsection

@section('content')
    <th data-col="id">ID</th>
    <th data-col="display_name">@lang('label.name')</th>
    <th data-col="user_role.label" data-select='{!! str_replace("'","`", json_encode($filter_select_columns['user_roles'])) !!}'>@lang('label.user_role')</th>
    <th data-col="email">@lang('label.email')</th>
    <th data-col="updated_at" class="no-sort" data-filter="false">@lang('label.updated_at_datetime')</th>
    <th data-col="created_at" class="no-sort" data-filter="false">@lang('label.created_at_datetime')</th>
    <th data-col="action">@lang('label.action')</th>
@endsection
