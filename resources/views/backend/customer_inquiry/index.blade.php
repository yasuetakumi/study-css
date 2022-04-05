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
    <th data-col="property.id" style="min-width: 50px">@lang('label.property_id')</th>
    <th data-col="contact_us_type.label_en" style="min-width: 150px">@lang('label.contact_us_type')</th>
    <th data-col="subject" style="min-width: 80px;">@lang('label.subject')</th>
    <th data-col="text" style="min-width: 250px;">@lang('label.text')</th>
    <th data-col="flag" style="min-width: 50px;">@lang('label.flag')</th>
    <th data-col="is_finish" style="min-width: 50px;">@lang('label.is_finish')</th>
    <th data-col="person_in_charge" style="min-width: 80px;">@lang('label.person_in_charge')</th>
    <th data-col="note" style="min-width: 150px;">@lang('label.note')</th>
    <th data-col="name" style="min-width: 80px;">@lang('label.name_inquiry')</th>
    <th data-col="email">@lang('label.email_inquiry')</th>
    <th data-col="company_name" style="min-width: 80px;">@lang('label.company_name')</th>
    <th data-col="created_at" style="min-width: 80px;">@lang('label.inquiry_created_at')</th>
    <th data-col="updated_at" style="min-width: 80px;">@lang('label.inquiry_updated_at')</th>
    <th data-col="action">@lang('label.action')</th>
@endsection
