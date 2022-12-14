<div id="form-group--{{ $name }}" class="row form-group{{ !empty($hide) ? ' hide' : '' }}">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-content">
        <div class="field-group clearfix @error($name) is-invalid @enderror">
            <input {{isset($isDisabled) && $isDisabled == true ? 'disabled' : '' }} type="file" id="input-{{ $name }}" name="{{ $name }}"
            accept="image/gif,image/jpeg,image/jpg,image/png" class="input-image @error($name) is-invalid @enderror"
            {{ !empty($required) && empty($value) ? 'required' : '' }} />

            <div id="image-preview-{{$name}}" class="image-preview">
                <a id="remove-image-{{$name}}" class="remove-image btn btn-xs btn-default">
                    <i class="fa fa-trash"></i>
                </a>
                <input type="hidden" class="input-remove-image" name="removable_image[{{$name}}]" value="false" />
                <img src="{{ !empty($value) ? asset('uploads/' . $value) : asset('img/backend/noimage.png') }}" data-default="{{ !empty($value) ? asset($value) : asset('img/backend/noimage.png') }}" data-empty="{{ asset('img/backend/noimage.png') }}" class="img-thumbnail">
            </div>
        </div>
    </div>
</div>
