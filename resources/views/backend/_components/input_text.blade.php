<div id="form-group--{{ $name }}" class="row form-group">
    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <input type="text"
            id="input-{{ $name }}" name="{{ $name }}"
            class="form-control @error($name) is-invalid @enderror" value="{{ !empty($value) ? $value : old($name) }}" {{ !empty($required) ? 'required' : '' }}
            {{isset($isReadOnly) && $isReadOnly == true ? 'readonly' : '' }}
            {{isset($onlyjapanese) && $onlyjapanese == true ? 'data-parsley-fullwidthjpntext' : null }}
            {{isset($nospace) && $nospace == true ? 'data-parsley-nospace' : null}}/>
    </div>
</div>
