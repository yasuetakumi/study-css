<div id="form-group--{{ $name }}" class="row form-group">


    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
        <strong class="field-title">{{ $label }}</strong>
        @if( $required !== 'false' )
            <span class="label-attach required">@lang('label.required')</span>
        @else
            <span class="label-attach optional">@lang('label.optional')</span>
        @endif
    </div>

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <div class="field-group clearfix">
            <v-select label="{{$label_select}}"
                :options="{{$options}}"
                v-model="{{$model}}"
                :reduce="option => option.id"
                @if(isset($name)) name="{{ $name }}"@endif
                v-on:input="{{isset($method) ? $method : ''}}"
                @if(isset($disabled)) :disabled="{{$disabled}}" @endif
                data-parsley-trigger="change focusout"
                @if(isset($function)) @change="{{ $function }}" @else @change="refreshParsley" @endif
                >
            </v-select>
            <div id="errorBlock-{{$name}}" class="errorBlock"></div>
            <div class="position-relative mt-1">
                <div class="bg-white position-absolute" style="top:0; bottom:0; right:0; left:0; z-index:99"></div>
                <input id="input-{{$name}}" type="text" class="" :value="{{$model}}" name="{{$name}}" {{ !empty($required) && $required != 'false' ? 'required' : '' }}
                data-parsley-required-message="@lang('validation.required', ['attribute' => $label])" data-parsley-errors-container = "#errorBlock-{{$name}}" data-parsley-no-focus>
            </div>

        </div>
    </div>
</div>

@push('css')
    <style>
        .vs__dropdown-toggle{
            padding: 0.4rem !important;
        }
        .vs__clear svg {
            width: 13px !important;
            height: 16px !important;
        }
    </style>
@endpush
