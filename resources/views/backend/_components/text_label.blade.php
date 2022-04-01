<div id="form-group--{{ $name }}" class="row form-group">
    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        @if(isset($value))
            <p class="mb-0 ml-1">{{$value}}</p>
        @endif
    </div>
</div>
