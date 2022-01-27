<div id="form-group--{{ $name }}" class="row form-group">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <select type="text" id="input-{{ $name }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ !empty($value) ? $value : old($name) }}" {{ !empty($required) ? 'required' : '' }} {{isset($isDisabled) && $isDisabled == true ? 'disabled' : '' }}>
            @foreach($options as $id => $label)
                <option value="{{ $id }}" id="input-{{ $name }}-{{ $id }}" {{ $value == $id ? "selected" : "" }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>
</div>
