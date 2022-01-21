@extends('backend._base.content_form')
@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> @lang('label.dashboard')</a></li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
@endsection

@section('top_buttons')

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

    @component('backend._components.input_image', ['name' => 'thumbnail_image_main', 'label' => __('Thumbnail Image Main'), 'required' => null, 'isDisabled' => true, 'value' => $item->thumbnail_image_main]) @endcomponent
    @component('backend._components.input_image', ['name' => 'thumbnail_image_1', 'label' => __('Thumbnail Image 1'), 'required' => null, 'isDisabled' => true, 'value' => $item->thumbnail_image_1]) @endcomponent
    @component('backend._components.input_image', ['name' => 'thumbnail_image_2', 'label' => __('Thumbnail Image 2'), 'required' => null, 'isDisabled' => true, 'value' => $item->thumbnail_image_2]) @endcomponent
    @component('backend._components.input_image', ['name' => 'thumbnail_image_3', 'label' => __('Thumbnail Image 3'), 'required' => null, 'isDisabled' => true, 'value' => $item->thumbnail_image_3]) @endcomponent
    @component('backend._components.input_image', ['name' => 'thumbnail_image_4', 'label' => __('Thumbnail Image 4'), 'required' => null, 'isDisabled' => true, 'value' => $item->thumbnail_image_4]) @endcomponent
    @component('backend._components.input_image', ['name' => 'thumbnail_image_5', 'label' => __('Thumbnail Image 5'), 'required' => null, 'isDisabled' => true, 'value' => $item->thumbnail_image_5]) @endcomponent
    @component('backend._components.input_image', ['name' => 'thumbnail_image_6', 'label' => __('Thumbnail Image 6'), 'required' => null, 'isDisabled' => true, 'value' => $item->thumbnail_image_6]) @endcomponent

    @component('backend._components.input_image', ['name' => 'image_1', 'label' => __('Image 1'), 'required' => null, 'isDisabled' => true, 'value' => $item->image_1]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_2', 'label' => __('Image 2'), 'required' => null, 'isDisabled' => true, 'value' => $item->image_2]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_3', 'label' => __('Image 3'), 'required' => null, 'isDisabled' => true, 'value' => $item->image_3]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_4', 'label' => __('Image 4'), 'required' => null, 'isDisabled' => true, 'value' => $item->image_4]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_5', 'label' => __('Image 5'), 'required' => null, 'isDisabled' => true, 'value' => $item->image_5]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_6', 'label' => __('Image 6'), 'required' => null, 'isDisabled' => true, 'value' => $item->image_6]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_7', 'label' => __('Image 7'), 'required' => null, 'isDisabled' => true, 'value' => $item->image_7]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_8', 'label' => __('Image 8'), 'required' => null, 'isDisabled' => true, 'value' => $item->image_8]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_9', 'label' => __('Image 9'), 'required' => null, 'isDisabled' => true, 'value' => $item->image_9]) @endcomponent

    @component('backend._components.input_image', ['name' => 'image_360_1', 'label' => __('Image 360 1'), 'required' => null, 'isDisabled' => true, 'value' => $item->image_360_1]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_360_2', 'label' => __('Image 360 2'), 'required' => null, 'isDisabled' => true, 'value' => $item->image_360_2]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_360_3', 'label' => __('Image 360 3'), 'required' => null, 'isDisabled' => true, 'value' => $item->image_360_3]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_360_4', 'label' => __('Image 360 4'), 'required' => null, 'isDisabled' => true, 'value' => $item->image_360_4]) @endcomponent
    @component('backend._components.input_image', ['name' => 'image_360_5', 'label' => __('Image 360 5'), 'required' => null, 'isDisabled' => true, 'value' => $item->image_360_5]) @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="row justify-content-center mt-4">
                <div class="col-12 border-bottom border-primary">
                    <p class="text-center" style="font-size: 22px">STEP 1</p>
                </div>
                <div class="col-12">
                    <div id="form-group--plans" class="row form-group">

                        @include('backend._components._input_header',['label'=>'Design Categories', 'required'=>true])

                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <div class="field-group clearfix">
                                @foreach($design_categories as $dc)
                                    <div class="icheck-cyan d-inline">
                                        <input type="radio" value="{{$dc['value']}}" id="input-dc-{{ $dc['value'] }}" name="design_category_id" />
                                        <label for="input-dc-{{ $dc['value'] }}" class="text-uppercase mr-5">{{ $dc['label_jp'] }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div id="form-group--plans" class="row form-group">

                        @include('backend._components._input_header',['label'=>'Design Styles', 'required'=>true])

                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <div class="field-group clearfix">
                                @foreach($design_styles as $ds)
                                    <div class="icheck-cyan d-inline">
                                        <input type="radio" value="{{$ds->id}}" id="input-ds-{{$ds->id}}" name="design_style_id" />
                                        <label for="input-ds-{{ $ds->id }}" class="text-uppercase mr-5">{{ $ds->display_name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 border-bottom border-primary">
                    <p class="text-center" style="font-size: 22px">STEP 2</p>
                </div>
                <div class="col-12">
                    <div id="form-group--plans" class="row form-group">

                        @include('backend._components._input_header',['label'=>'Plans', 'required'=>true])

                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <div class="field-group clearfix">
                                @foreach($plans as $plan)
                                    <div class="icheck-cyan d-inline">
                                        <input type="radio" value="{{$plan->id}}" id="input-plan-{{ $plan->id }}" name="plan_id" />
                                        <label for="input-plan-{{ $plan->id }}" class="text-uppercase mr-5">{{ $plan->display_name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 border-bottom border-primary">
                    <p class="text-center" style="font-size: 22px">STEP 3</p>
                </div>
                <div class="col-12">
                    @component('backend._components.input_text', ['name' => 'tsubo_area', 'label' => __('Tsubo Area'), 'required' => null, 'value' => round($item->surface_area / 3.30579 )]) @endcomponent
                    <input id="slider" class="slider-red input slider w-100" step="1" type="range" min="{{$min_surface_area}}" max="{{$max_surface_area}}" value="{{$min_surface_area}}" >
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 border-bottom border-primary">
                    <p class="text-center" style="font-size: 22px">Do You Want Kitchen</p>
                </div>
                <div class="col-12">
                    <div id="form-group--plans" class="row form-group">

                        @include('backend._components._input_header',['label'=>'Plans', 'required'=>true])

                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                            <div class="field-group clearfix">
                                @foreach($has_kitchens as $hs)
                                    <div class="icheck-cyan d-inline">
                                        <input type="radio" value="{{$hs['value']}}" id="input-hs-{{ $hs['value'] }}" name="has_kitchen" />
                                        <label for="input-hs-{{ $hs['value'] }}" class="text-uppercase mr-5">{{ $hs['label_jp'] }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 border-bottom border-primary">
                    <p class="text-center" style="font-size: 22px">Estimation Index</p>
                </div>
                <div class="col-12 text-left mt-4">
                    <button id="estimate" class="btn btn-primary"> Estimation Index</button>
                    <br>
                    <div class="d-flex mt-4">
                        <p style="font-size: 20px">Estimation Index Value : </p>
                        <p id="estimation_index" style="font-size: 20px; margin-left:5px;"> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript"> var root_url = "{{ url('/') }}";</script>
    <script>
        $( document ).ready(function() {
            $('#slider').on('change', function() {
                var value = this.value;
                $('#input-tsubo_area').val(value);
            });
            $('#estimate').on('click', function() {
                var design_category_id = $("input[name='design_category_id']:checked").val();
                var design_style_id = $("input[name='design_style_id']:checked").val();
                var plan_id = $("input[name='plan_id']:checked").val();
                var tsubo_area = $('#input-tsubo_area').val();
                var has_kitchen = $("input[name='has_kitchen']:checked").val();
                var uri = root_url + '/api/v1/plans/getGrandTotalEstimation/' + plan_id + '/' + tsubo_area + '/' + design_style_id + '/' + has_kitchen + '/' + design_category_id
                console.log(plan_id);
                console.log(tsubo_area);
                console.log(design_style_id);
                console.log(has_kitchen);
                console.log(design_category_id);
                console.log(uri);
                $.ajax({
                    type: 'GET',
                    dataType:"json",
                    url: uri,
                    //url: 'http://localhost:8000/api/v1/plans/getGrandTotalEstimation/13/15/2/0/1',
                    success: function (response) {
                        console.log(response);
                        $('#estimation_index').text(response.min);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus); alert("Error: " + errorThrown);
                    }
                });
            });
        });

    </script>
@endpush
