<div id="form-group--{{ $name }}" class="row form-group">
    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <div class="field-group clearfix @error($name) is-invalid @enderror">
            @foreach($options as $option)
                @php
                    $current_value = !empty($is_indexed_value) ? $loop->index + 1 : $option;
                @endphp
                <div class="icheck-cyan d-inline">
                    <input type="checkbox" value="{{ $current_value }}" id="input-{{ $name }}-{{ $loop->index }}" name="{{ $name }}" {{ in_array($current_value, $value) ? "checked" : "" }} data-parsley-checkmin="1" />
                    <label for="input-{{ $name }}-{{ $loop->index }}" class="text-uppercase mr-5">{{ $option }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
