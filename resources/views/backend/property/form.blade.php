@extends('backend._base.content_form')
@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('top_buttons')
    @if ($page_type == "create")
        <a href="{{route('admin.user.index')}}" class="btn btn-secondary float-sm-right">@lang('label.list')</a>
    @else
        <a href="{{route('admin.user.create')}}" class="btn btn-secondary float-sm-right">@lang('label.createNew')</a>
        <a href="{{route('admin.user.index')}}" class="btn btn-secondary float-sm-right">@lang('label.list')</a>
    @endif
@endsection

@section('content')
    @component('backend._components.input_text', ['name' => 'location', 'label' => __('label.location'), 'required' => null, 'value' => $item->display_name, 'page_type' => $page_type ]) @endcomponent
    @component('backend._components.input_text', ['name' => 'location', 'label' => __('label.location'), 'required' => null, 'value' => $item->display_name, 'page_type' => $page_type ]) @endcomponent
    @component('backend._components.input_text', ['name' => 'location', 'label' => __('label.location'), 'required' => null, 'value' => $item->display_name, 'page_type' => $page_type ]) @endcomponent
    @component('backend._components.input_text', ['name' => 'location', 'label' => __('label.location'), 'required' => null, 'value' => $item->display_name]) @endcomponent
@endsection
