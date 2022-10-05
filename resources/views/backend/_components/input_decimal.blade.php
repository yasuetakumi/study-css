<div id="form-group--{{ $name }}" class="row form-group">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        {{-- <input type="number" step="0.01" placeholder="0.01" id="input-{{ $name }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ !empty($value) ? $value : old($name) }}" {{ !empty($required) ? 'required' : '' }} /> --}}
        <input data-parsley-required-message="@lang('validation.required', ['attribute' => $label])" step="0.0001"
        placeholder="{{ isset($placeholder) ? $placeholder : '' }}" v-on:change="{{isset($method) ? $method : ''}}"
        type="number" id="input-{{ $name }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
        value="{{ !empty($value) ? $value : old($name) }}" {{ !empty($required) ? 'required' : '' }} {{isset($isReadOnly) && $isReadOnly == true ? 'readonly' : '' }} />
    </div>
</div>
