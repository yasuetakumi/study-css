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
    @component('backend._components.input_select', ['name' => 'user_id', 'options' => $users, 'label' => __('label.user'), 'required' => null, 'value' => $item->user_id, 'isDisabled' => true]) @endcomponent
    @component('backend._components.input_select', ['name' => 'postcode_id', 'options' => $postcodes, 'label' => __('label.postcode'), 'required' => 1, 'value' => $item->postcode_id, 'isDisabled' => true]) @endcomponent
    @component('backend._components.input_select', ['name' => 'prefecture_id', 'options' => $prefectures, 'label' => __('label.prefecture'), 'required' => null, 'value' => $item->prefecture_id, 'isDisabled' => true]) @endcomponent
    @component('backend._components.input_select', ['name' => 'cities_id', 'options' => $cities, 'label' => __('label.cities'), 'required' => null, 'value' => $item->cities_id, 'isDisabled' => true]) @endcomponent
    @component('backend._components.input_text', ['name' => 'location', 'label' => __('label.location'), 'required' => null, 'value' => $item->location, 'isReadOnly' => true ]) @endcomponent
    @component('backend._components.input_text', ['name' => 'surface_area', 'label' => __('label.surface_area_meter'), 'required' => null, 'value' => $item->surface_area, 'isReadOnly' => true ]) @endcomponent
    @component('backend._components.input_text', ['name' => 'surface_area', 'label' => __('label.surface_area_tsubo'), 'required' => null, 'value' => $item->surface_area, 'isReadOnly' => true ]) @endcomponent
    @component('backend._components.input_number', ['name' => 'rent_amount', 'label' => __('label.rent_amount'), 'required' => null, 'value' => $item->rent_amount, 'isReadOnly' => true]) @endcomponent
    @component('backend._components.input_number', ['name' => 'cost_of_rent', 'label' => __('label.cost_of_rent'), 'required' => null, 'value' => $item->rent_amount, 'isReadOnly' => true]) @endcomponent
    @component('backend._components.input_number', ['name' => 'rent_amount_man', 'label' => __('label.rent_amount_man'), 'required' => null, 'value' => $item->rent_amount, 'isReadOnly' => true]) @endcomponent
    @component('backend._components.input_number', ['name' => 'number_of_floor_underground', 'label' => __('label.number_of_floor_underground'), 'required' => null, 'value' => $item->number_of_floor_aboveground, 'isReadOnly' => true]) @endcomponent
    @component('backend._components.input_number', ['name' => 'number_of_floor_aboveground', 'label' => __('label.number_of_floor_aboveground'), 'required' => null, 'value' => $item->number_of_floor_aboveground, 'isReadOnly' => true]) @endcomponent
    @component('backend._components.input_select', ['name' => 'property_type_id', 'options' => $property_types, 'label' => __('label.restaurant_type'), 'required' => null, 'value' => $item->property_type_id, 'isDisabled' => true]) @endcomponent
    @component('backend._components.input_select', ['name' => 'structure_id', 'options' => $structures, 'label' => __('label.structure'), 'required' => null, 'value' => $item->structure_id, 'isDisabled' => true]) @endcomponent
    @component('backend._components.input_number', ['name' => 'deposit', 'label' => __('label.deposit'), 'required' => null, 'value' => $item->deposit_amount, 'isReadOnly' => true]) @endcomponent
    @component('backend._components.input_number', ['name' => 'monthly_maintainance_fee', 'label' => __('label.monthly_maintaner'), 'required' => null, 'value' => $item->monthly_maintainance_fee, 'isReadOnly' => true]) @endcomponent
    @component('backend._components.input_text', ['name' => 'repayment_conditions', 'label' => __('label.repayment_conditions'), 'required' => null, 'value' => $item->repayment_conditions, 'isReadOnly' => true ]) @endcomponent
    @component('backend._components.input_date_picker', ['name' => 'date_built', 'label' => __('label.year_built'), 'required' => null, 'value' => $item->date_built, 'isReadOnly' => true ]) @endcomponent
    @component('backend._components.input_text', ['name' => 'renewal_fee', 'label' => __('label.renewal_fee'), 'required' => null, 'value' => $item->renewal_fee, 'isReadOnly' => true ]) @endcomponent
    @component('backend._components.input_number', ['name' => 'contract_length_in_months', 'label' => __('label.contract_length'), 'required' => null, 'value' => $item->contract_length_in_months, 'isReadOnly' => true ]) @endcomponent
    @component('backend._components.input_number', ['name' => 'special_moving_fee', 'label' => __('label.moving_fee'), 'required' => null, 'value' => $item->special_moving_fee, 'isReadOnly' => true ]) @endcomponent
    @component('backend._components.input_select', ['name' => 'business_term_id', 'options' => $business_terms, 'label' => __('label.business_terms'), 'required' => null, 'value' => $item->business_term_id, 'isDisabled' => true]) @endcomponent
    @component('backend._components.input_text_editor', ['name' => 'comment', 'label' => __('label.comments'), 'required' => null, 'value' => $item->comment, 'isReadOnly' => true ]) @endcomponent

    @component('backend._components.input_select', ['name' => 'is_skeleton', 'options' => $is_skeleton, 'label' => __('label.skeleton'), 'required' => null, 'value' => $item->is_skeleton, 'isDisabled' => true]) @endcomponent

    @component('backend._components.input_select', ['name' => 'cuisine_id', 'options' => $cuisines, 'label' => __('label.restaurant_cuisine'), 'required' => null, 'value' => $item->cuisine_id, 'isDisabled' => true]) @endcomponent

    @component('backend._components.input_image', ['name' => 'thumbnail_image_main', 'label' => __('Thumbnail Image Main'), 'required' => null, 'value' => $item->thumbnail_image_main]) @endcomponent
    @component('backend._components.input_image', ['name' => 'thumbnail_image_1', 'label' => __('Thumbnail Image 1'), 'required' => null, 'value' => $item->thumbnail_image_1]) @endcomponent
    @component('backend._components.input_image', ['name' => 'thumbnail_image_2', 'label' => __('Thumbnail Image 2'), 'required' => null, 'value' => $item->thumbnail_image_2]) @endcomponent
    @component('backend._components.input_image', ['name' => 'thumbnail_image_3', 'label' => __('Thumbnail Image 3'), 'required' => null, 'value' => $item->thumbnail_image_3]) @endcomponent
    @component('backend._components.input_image', ['name' => 'thumbnail_image_4', 'label' => __('Thumbnail Image 4'), 'required' => null, 'value' => $item->thumbnail_image_4]) @endcomponent
    @component('backend._components.input_image', ['name' => 'thumbnail_image_5', 'label' => __('Thumbnail Image 5'), 'required' => null, 'value' => $item->thumbnail_image_5]) @endcomponent
    @component('backend._components.input_image', ['name' => 'thumbnail_image_6', 'label' => __('Thumbnail Image 6'), 'required' => null, 'value' => $item->thumbnail_image_6]) @endcomponent

    @component('backend._components.input_image', ['name' => 'image_1', 'label' => __('Image 1'), 'required' => null, 'value' => $item->image_1]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_2', 'label' => __('Image 2'), 'required' => null, 'value' => $item->image_2]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_3', 'label' => __('Image 3'), 'required' => null, 'value' => $item->image_3]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_4', 'label' => __('Image 4'), 'required' => null, 'value' => $item->image_4]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_5', 'label' => __('Image 5'), 'required' => null, 'value' => $item->image_5]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_6', 'label' => __('Image 6'), 'required' => null, 'value' => $item->image_6]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_7', 'label' => __('Image 7'), 'required' => null, 'value' => $item->image_7]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_8', 'label' => __('Image 8'), 'required' => null, 'value' => $item->image_8]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_9', 'label' => __('Image 9'), 'required' => null, 'value' => $item->image_9]) @endcomponent

    @component('backend._components.input_image', ['name' => 'image_360_1', 'label' => __('Image 360 1'), 'required' => null, 'value' => $item->image_360_1]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_360_2', 'label' => __('Image 360 2'), 'required' => null, 'value' => $item->image_360_2]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_360_3', 'label' => __('Image 360 3'), 'required' => null, 'value' => $item->image_360_3]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_360_4', 'label' => __('Image 360 4'), 'required' => null, 'value' => $item->image_360_4]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_360_5', 'label' => __('Image 360 5'), 'required' => null, 'value' => $item->image_360_5]) @endcomponent

@endsection
