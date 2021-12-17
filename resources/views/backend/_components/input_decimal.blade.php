<div id="form-group--{{ $name }}" class="row form-group">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-1 col-content">
        <input type="number" step="0.01" placeholder="0.01" id="input-{{ $name }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ !empty($value) ? $value : old($name) }}" {{ !empty($required) ? 'required' : '' }} />
    </div>
</div>
