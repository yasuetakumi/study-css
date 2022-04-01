<div id="form-group-btn" class="row form-group">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <a href="{{!empty($route) ? $route : '#' }}" class="btn btn-danger text-right">
            {{!empty($value) ?  $value : 'Update'}}
        </a>
    </div>
</div>
