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
                @if(isset($function)) @change="{{ $function }}" @else @change="refreshParsley" @endif>
            </v-select>
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
