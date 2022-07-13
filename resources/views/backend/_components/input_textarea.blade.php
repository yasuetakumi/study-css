<div id="form-group--{{ $name }}" class="row form-group">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <textarea placeholder="{{ isset($placeholder) ? $placeholder : '' }}" {{isset($isReadOnly) && $isReadOnly == true ? 'disabled':''}} id="input-{{ $name }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" {{ !empty($required) ? 'required' : '' }}>{{ !empty($value) ? $value : old($name) }}</textarea>
    </div>
</div>
