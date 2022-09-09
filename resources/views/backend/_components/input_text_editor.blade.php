<div id="form-group--{{ $name }}" class="row form-group">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <textarea {{isset($isReadOnly) && $isReadOnly == true ? 'disabled':''}} id="input-{{ $name }}" name="{{ $name }}" class="{{isset($isReadOnly) && $isReadOnly == true ? 'form-control':'text-editor'}} datepicker    @error($name) is-invalid @enderror" {{ !empty($required) ? 'required' : '' }} data-parsley-required-message="@lang('validation.required', ['attribute' => $label])">{{ !empty($value) ? $value : old($name) }}</textarea>
    </div>
</div>
