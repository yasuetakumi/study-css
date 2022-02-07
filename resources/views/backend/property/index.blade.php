@extends('backend._base.content_datatables')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('top_buttons')
    @if (Auth::guard('user')->check())
        <a href="{{route('property.create')}}" class="btn btn-secondary">@lang(('label.createNew'))</a>
    @else
        <a href="{{route('admin.property.create')}}" class="btn btn-secondary">@lang(('label.createNew'))</a>
    @endif
@endsection

@section('content')
    <th data-col="id">ID</th>
    <th data-col="user.display_name">@lang('label.name')</th>
    <th data-col="postcode.postcode">@lang('label.postcode')</th>
    <th data-col="location">@lang('label.location')</th>
    <th data-col="man">@lang('label.rent_amount')</th>
    <th data-col="tsubo">@lang('label.surface_area')</th>
    <th data-col="updated_at">@lang('label.last_update')</th>
    <th data-col="created_at">@lang('label.created_at')</th>
    <th data-col="action">@lang('label.action')</th>
@endsection


