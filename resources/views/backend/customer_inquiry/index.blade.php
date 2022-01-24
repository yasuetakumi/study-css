@extends('backend._base.content_datatables')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('top_buttons')
    <a href="#" class="btn btn-secondary">@lang(('label.createNew'))</a>
@endsection

@section('content')
    <th data-col="id">ID</th>
    <th data-col="property.id">Property ID</th>
    <th data-col="contact_us_type.label_en">Contact Type</th>
    <th data-col="subject">Subject</th>
    <th data-col="text">Text</th>
    <th data-col="flag">Flag</th>
    <th data-col="is_finish">Is Finish</th>
    <th data-col="person_in_charge">Person In Charge</th>
    <th data-col="note">Note</th>
    <th data-col="name">Name</th>
    <th data-col="email">Email</th>
    <th data-col="company_name">Company Name</th>
    <th data-col="updated_at">@lang('label.last_update')</th>
    <th data-col="action">@lang('label.action')</th>
@endsection
