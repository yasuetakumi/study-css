<div id="form-group--{{ $name }}" class="row form-group{{ !empty($hide) ? ' hide' : '' }}">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-content">
        <div class="field-group clearfix @error($name) is-invalid @enderror">
            <input {{isset($isDisabled) && $isDisabled == true ? 'disabled' : '' }} type="file" id="input-{{ $name }}" name="{{ $name }}" accept="image/gif,image/jpeg,image/jpg,image/png" class="input-image @error($name) is-invalid @enderror" {{ !empty($required) && empty($value) ? 'required' : '' }} />

            <div id="image-preview-{{$name}}" class="image-preview">
                @if(!empty($value) && empty($required))
                    <a id="remove-image-{{$name}}" class="remove-image btn btn-xs btn-default">
                        <i class="fa fa-trash"></i>
                    </a>
                @endif
                <input type="hidden" class="input-remove-image" name="removable_image[{{$name}}]" value="false" />
                <img src="{{ !empty($value) ? asset('uploads/' . $value) : asset('img/backend/noimage.png') }}" data-default="{{ !empty($value) ? asset($value) : asset('img/backend/noimage.png') }}" data-empty="{{ asset('img/backend/noimage.png') }}" class="img-thumbnail">
                @if (!empty($value))
                    <div class="d-block mt-4">
                        <iframe width="300" height="200" allowfullscreen style="border-style:none;" src="{{asset('js/pannellum/pannellum.htm')}}#panorama={{asset('uploads/' . $value )}}&amp;autoLoad=true"></iframe>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
