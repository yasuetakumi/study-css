<div id="form-group--{{ $name }}" class="row form-group">
    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <input type="text"
            data-parsley-required-message="@lang('validation.required', ['attribute' => $label])"
            placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
            id="input-{{ $name }}" name="{{ $name }}"
            class="form-control @error($name) is-invalid @enderror" value="{{ !empty($value) ? $value : old($name) }}" {{ !empty($required) ? 'required' : '' }}
            {{isset($isReadOnly) && $isReadOnly == true ? 'readonly' : '' }}
            {{isset($onlyjapanese) && $onlyjapanese == true ? 'data-parsley-fullwidthjpntext' : null }}
            {{isset($onlyjapanese) && $onlyjapanese == true ? 'data-parsley-fullwidthjpntext-message = 漢字テキストを入力してください ' : null }}

            {{isset($onlykatana) && $onlykatana == true ? 'data-parsley-fullwidthkatakana' : null }}
            {{isset($onlykatana) && $onlykatana == true ? 'data-parsley-fullwidthkatakana-message = カタカナ文字を入力してください ' : null }}
            {{isset($nospace) && $nospace == true ? 'data-parsley-nospace' : null}}/>
    </div>
</div>
