<div id="form-group--{{ $name }}" class="row form-group">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <textarea {{isset($isReadOnly) ? 'disabled':''}} id="input-{{ $name }}" name="{{ $name }}" class="{{isset($isReadOnly) ? 'form-control':'text-editor'}} datepicker    @error($name) is-invalid @enderror" {{ !empty($required) ? 'required' : '' }}>{{ !empty($value) ? $value : old($name) }}</textarea>
    </div>
</div>
