@extends('backend._base.content_datatables')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('top_buttons')
    <a href="#" class="btn btn-secondary">@lang('label.createNew')</a>
@endsection

@section('content')
    <th data-col="id">ID</th>
    <th data-col="property.id">@lang('label.property_id')</th>
    <th data-col="contact_us_type.label_en">@lang('label.contact_us_type')</th>
    <th data-col="subject">@lang('label.subject')</th>
    <th data-col="text">@lang('label.text')</th>
    <th data-col="flag">@lang('label.flag')</th>
    <th data-col="is_finish">@lang('label.is_finish')</th>
    <th data-col="person_in_charge">@lang('label.person_in_charge')</th>
    <th data-col="note">@lang('label.note')</th>
    <th data-col="name">@lang('label.name')</th>
    <th data-col="email">@lang('label.email')</th>
    <th data-col="company_name">@lang('label.company_name')</th>
    <th data-col="updated_at">@lang('label.last_update')</th>
    <th data-col="action">@lang('label.action')</th>
@endsection
