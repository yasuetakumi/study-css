<div id="form-group--{{ $name }}" class="row form-group{{ !empty($hide) ? ' hide' : '' }}">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-content">
        <div class="field-group clearfix @error($name) is-invalid @enderror">
            <input type="file" id="input-{{ $name }}" name="{{ $name }}" accept="{{ $accept ?? '' }}" class="input-file @error($name) is-invalid @enderror" {{ !empty($required) && empty($value) ? 'required' : '' }} />
            @if(!empty($value))
                <br/>
                <a download target="_blank" href="{{ asset('uploads/' . $value) }}" class="badge badge-info text-sm mt-1 p-1"><i class="fa fa-file-download"></i> @lang('label.download_file')</a>
            @endif
        </div>
    </div>
</div>
