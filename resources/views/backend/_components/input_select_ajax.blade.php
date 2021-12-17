<div id="form-group--{{ $name }}" class="row form-group">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        @php
            if( !empty( old($name . '_label') ) ){
                $options    = [old($name . '_label')];
                $value      = old($name);
            }
        @endphp
        <select data-url="{{ $url }}" type="text" id="input-{{ $name }}" name="{{ $name }}" class="select2ajax form-control @error($name) is-invalid @enderror" {{ !empty($required) ? 'required' : '' }}>
            @foreach($options as $id => $label)
                <option value="{{ $value }}" id="input-{{ $name }}-{{ $id }}" {{ $value == $id ? "selected" : "" }}>{{ $label }}</option>
            @endforeach
        </select>
        <input type="hidden" name="{{ $name }}_label" id="input-{{ $name }}-selected-label" class="selected-label" />
    </div>
</div>
