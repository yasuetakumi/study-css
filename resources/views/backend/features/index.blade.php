@extends('backend._base.content_datatables')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('top_buttons')
    <a href="{{ route('admin.features.create') }}" class="btn btn-secondary">@lang(('label.createNew'))</a>
@endsection

@section('content')
    <th data-col="id">ID</th>
    <th data-col="title">@lang('label.title')</th>

    <th data-col="updated_at" width="120">@lang('label.last_update')</th>
    <th data-col="action">@lang('label.action')</th>
@endsection
