<div id="form-group-btn" class="row form-group">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="{{'#'.$targetModal}}">
            {{$value}}
        </button>

        <div class="modal fade" id="{{$targetModal}}" tabindex="-1" aria-labelledby="{{$targetModal.'Label'}}" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="text-lg">{{$body}}</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('label.close')</button>
                <a href="{{!empty($route) ? $route : '#' }}" class="btn btn-danger text-right">
                    @lang('label.update')
                </a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
