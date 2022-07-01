<div id="form-group" class="row form-group">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
        <strong class="field-title">{{ $label }}</strong>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        @if(isset($value))
            <p class="mb-0 ml-1">{{$value}}</p>
        @endif
    </div>
</div>
