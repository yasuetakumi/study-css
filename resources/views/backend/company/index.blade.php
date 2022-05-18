@php
    $isApproval = Route::currentRouteName() == 'admin.approval.index';
    $isAdminLogin = false;
    $isCompanyLogin = false;
    if(Auth::guard('user')->check()){
        $isCompanyLogin = true;
    } else if(Auth::check()) {
        $isAdminLogin = true;
    }
@endphp
@extends('backend._base.content_datatables')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        @if($isAdminLogin)
            <li class="breadcrumb-item"><a href="{{route('admin.property.index')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        @else
            <li class="breadcrumb-item"><a href="{{route('company.property.index')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        @endif
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('top_buttons')
    @if (!$isApproval)
        <a href="{{ route('admin.company.create') }}" class="btn btn-secondary">@lang(('label.createNew'))</a>
    @endif
@endsection

@section('content')
    <th data-col="id">ID</th>
    <th data-col="company_name">@lang('label.name')</th>
    <th data-col="status" data-select='{!! str_replace("'","`", json_encode($filter_select_columns['status'])) !!}'>@lang('label.status')</th>
    <th data-col="post_code">@lang('label.post_code')</th>
    <th data-col="address">@lang('label.address')</th>
    <th data-col="phone">@lang('label.phone')</th>
    <th data-col="updated_at">@lang('label.last_update')</th>
    <th data-col="action" width="150">@lang('label.action')</th>
@endsection
