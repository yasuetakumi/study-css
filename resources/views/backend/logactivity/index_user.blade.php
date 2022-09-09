@extends('backend._base.content_datatables')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('top_buttons')
@endsection

@section('content')
    <th data-col="id">ID</th>
    <th data-col="user.display_name">@lang('label.name')</th>
    <th data-col="user.email">@lang('label.email')</th>
    <th data-col="activity">@lang('label.activity')</th>
    <th data-col="detail">@lang('label.detail')</th>
    <th data-col="ip">@lang('label.ip')</th>
    {{-- example custom filter --}}
    <th class="no-sort" data-filter="false" data-col="formatted_access_time" data-name="formatted_access_time" data-datepicker="true">@lang('label.access_time')</th>
@endsection
