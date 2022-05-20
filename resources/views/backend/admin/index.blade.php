@php
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
    <a href="{{ route('admin.admins.create') }}" class="btn btn-secondary">@lang(('label.createNew'))</a>
@endsection

@section('content')
    <th data-col="id">ID</th>
    <th data-col="display_name">@lang('label.name')</th>
    <th data-col="email">@lang('label.email')</th>
    <th data-col="created_at">@lang('label.created_at')</th>
    <th data-col="updated_at">@lang('label.last_update')</th>
    <th data-col="action">@lang('label.action')</th>
@endsection
