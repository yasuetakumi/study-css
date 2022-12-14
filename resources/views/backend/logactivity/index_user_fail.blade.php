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
    {{--<th data-col="activity">@lang('label.activity')</th>--}}
    <th data-col="id">ID</th>
    <th data-col="detail">@lang('label.detail')</th>
    <th data-col="ip">@lang('label.ip')</th>
    <th class="no-sort" data-filter="false" data-col="access_time">@lang('label.access_time')</th>
@endsection

@push('css')
    <style>
        #datatable tbody tr > td:last-of-type {
            text-align: left !important;
        }
    </style>
@endpush
