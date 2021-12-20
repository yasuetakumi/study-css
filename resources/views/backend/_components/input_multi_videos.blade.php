<div id="form-group--{{ $name }}" class="row form-group{{ !empty($hide) ? ' hide' : '' }}">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-content">
        <div class="field-group clearfix @error($name) is-invalid @enderror">
            <input type="file" id="input-{{ $name }}" name="{{ $name }}" accept="video/mp4,video/x-m4v" class="input-video @error($name) is-invalid @enderror {{ !empty($required) && empty($value) ? 'required' : '' }}" {{ !empty($required) && empty($value) ? 'required' : '' }} >

            <small class="form-text text-danger">動画をアップロードして下さい。M4V、およびMP4ファイルのみが許可されて、容量は50MBまでです。</small>

            <div id="video-preview-{{$name}}" class="video-preview">
                <a id="remove-video-{{$name}}" class="remove-video btn btn-xs btn-default">
                    <i class="fa fa-trash"></i>
                </a>
                <input type="hidden" class="input-remove-video" name="removable_video[{{$name}}]" value="false" />
                <video src="{{ !empty($value) ? asset('uploads/' . $value) : null }}" data-default="{{ !empty($value) ? asset($value) : asset('img/backend/noimage.png') }}" data-empty="{{ asset('img/backend/noimage.png') }}" class="img-thumbnail"
                controls>
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</div>
