<div id="form-group" class="row form-group">

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
        <strong class="field-title">{{ $label }}</strong>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-content">
        <div class="field-group clearfix">
            <div id="image-preview" class="image-preview">
                @if (!empty($value))
                     <iframe width="400" height="250" allowfullscreen style="border-style:none;" src="{{asset('js/pannellum/pannellum.htm')}}#panorama={{asset('uploads/' . $value )}}&amp;autoLoad=true"></iframe>
                @else
                    <img src="{{ asset('uploads/' . $value)}}" onerror="this.src='{{asset('img/backend/noimage.png')}}'" class="img-thumbnail"/>
                @endif
            </div>
        </div>
    </div>
</div>
