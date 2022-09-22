<div id="form-group--{{ $name }}" class="row form-group">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <input data-parsley-required-message="@lang('validation.required', ['attribute' => $label])" placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
        v-on:change="{{isset($method) ? $method : ''}}" type="text"
        id="input-{{ $name }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
        onkeypress="validatePhoneNumber(event)"
        value="{{ !empty($value) ? $value : old($name) }}" {{ !empty($required) ? 'required' : '' }}
        {{isset($isReadOnly) && $isReadOnly == true ? 'readonly' : '' }}
        {{isset($min) ? 'minlength='.$min : '' }}
        {{isset($max) ? 'maxlength='.$max : '' }}
        data-parsley-phonenumber
        data-parsley-phonenumber-message="@lang('label.phone_validation', ['attribute' => $label])"
        {{isset($isDisabled) && $isDisabled == true ? 'disabled' : '' }} />
    </div>
</div>
