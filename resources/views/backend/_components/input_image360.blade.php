<div id="form-group--{{ $name }}" class="row form-group{{ !empty($hide) ? ' hide' : '' }}">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-content">
        <div class="field-group clearfix @error($name) is-invalid @enderror">
            <input {{isset($isDisabled) && $isDisabled == true ? 'disabled' : '' }} type="file" id="input-{{ $name }}" name="{{ $name }}" accept="image/jpeg,image/jpg" class="input-image-360 @error($name) is-invalid @enderror" {{ !empty($required) && empty($value) ? 'required' : '' }} />

            <div id="image-preview-{{$name}}" class="image-preview">
                @if(!empty($value) && empty($required))
                    <a id="remove-image-360-{{$name}}" class="remove-image remove-image-360 btn btn-xs btn-default" style="right: -45px; top: 0px">
                        <i class="fa fa-trash"></i>
                    </a>
                @endif
                <input type="hidden" class="input-remove-image input-remove-image-360" name="removable_image[{{$name}}]" value="false" />
                <img src="{{ !empty($value) ? asset('uploads/' . $value) : asset('img/backend/noimage.png') }}" data-default="{{ !empty($value) ? asset($value) : asset('img/backend/noimage.png') }}" data-empty="{{ asset('img/backend/noimage.png') }}" class="img-thumbnail">
                @if (!empty($value))
                    <div class="panorama-image-edit mt-4">
                        <iframe width="400" height="200" allowfullscreen style="border-style:none;" src="{{asset('js/pannellum/pannellum.htm')}}#panorama={{asset('uploads/' . $value )}}&amp;autoLoad=true"></iframe>
                    </div>
                @endif
                <div id="loading-spin" class="spinner-border text-primary mt-3 d-none" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="panorama-image mt-3">

                </div>
            </div>
        </div>
    </div>
</div>
