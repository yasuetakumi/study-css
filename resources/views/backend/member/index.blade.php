@extends('backend._base.content_datatables')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('top_buttons')
    <a href="{{route('admin.member.create')}}" class="btn btn-secondary">@lang(('label.createNew'))</a>
@endsection

@section('content')
    <th data-col="id">ID</th>
    <th data-col="company_name">@lang('label.company_name')</th>
    <th data-col="phone_number">@lang('label.phone_number')</th>
    <th data-col="email">@lang('label.email')</th>
    <th data-col="line_id">@lang('label.line_id')</th>
    <th data-col="social_accounts">@lang('label.social_login')</th>
    <th data-col="action">@lang('label.action')</th>
@endsection
