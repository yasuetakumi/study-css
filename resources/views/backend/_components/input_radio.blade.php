<div id="form-group--{{ $name }}" class="row form-group">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <div class="field-group clearfix @error($name) is-invalid @enderror">
            @foreach($options as $option)
                @php
                    $current_value = !empty($is_indexed_value) ? $loop->index + 1 : $option;
                    if(isset($indexStartFrom0) && $indexStartFrom0){
                        $current_value = $loop->index;
                    }
                @endphp
                <div class="icheck-cyan d-inline">
                    <input type="radio" value="{{ $current_value }}" id="input-{{ $name }}-{{ $loop->index }}"
                    name="{{ $name }}" {{ !empty($loop->first) && (!empty($value) || $value == "") ? "checked" : "" }} {{ $value == $current_value ? "checked" : "" }}
                    {{isset($isDisabled) && $isDisabled == true ? 'disabled' : '' }}
                    {{isset($isReadonly) && $isReadonly == true ? 'readonly' : '' }}
                    data-parsley-required-message="@lang('validation.required', ['attribute' => $label])"/>
                    <label for="input-{{ $name }}-{{ $loop->index }}" class="text-uppercase mr-5">{{ $option }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
