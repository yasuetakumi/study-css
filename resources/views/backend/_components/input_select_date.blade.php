<div id="form-group--{{ $name }}" class="row form-group">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-content">
        <select type="text" id="input-{{ $name }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ !empty($value) ? $value : old($name) }}" {{ !empty($required) ? 'required' : '' }} {{isset($isDisabled) && $isDisabled == true ? 'disabled' : '' }}
            v-on:change="{{isset($method) ? $method : ''}}">
            <option value=""></option>
            @foreach($options as $opt)
                <option value="{{ $opt['value'] }}" id="input-{{ $name }}-{{ $opt['value'] }}" {{ $value == $opt['value'] ? "selected" : "" }}>{{ $opt['label'] }}</option>
            @endforeach
        </select>
    </div>
</div>
