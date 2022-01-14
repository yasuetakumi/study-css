<div id="form-group--{{ $name }}" class="row form-group">
    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])
    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 col-content">
        <input type="text"
            id="input-{{ $name }}" name="{{ $name }}"
            class="form-control input-datepicker @error($name) is-invalid @enderror"
            value="{{ !empty($value) ? $value : old($name) }}" {{ !empty($required) ? 'required' : '' }}
            {{isset($isReadOnly) ? 'readonly' : '' }}/>
    </div>
</div>
