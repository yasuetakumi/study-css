<div id="form-group--{{ $name }}" class="row form-group">
    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 col-content wrapper-message">

        <div class="input-group mb-3">
            <input data-multiply="{{ $multiply }}" data-target="input-ratio-{{ $name }}" type="number" step="0.001" placeholder="0.001" id="input-{{ $name }}" name="{{ $name }}" class="input-decimal-ratio form-control @error($name) is-invalid @enderror" value="{{ !empty(old($name)) ? old($name) : $value  }}" {{ !empty($required) ? 'required' : '' }} />
            <div class="input-group-append">
                <span class="input-group-text">{{ $unit }}</span>
            </div>
        </div>

    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 col-content">

        <div class="input-group mb-3">
            <input disabled type="number" step="0.01" placeholder="0.01" id="input-ratio-{{ $name }}" class="form-control disabled @error($name) is-invalid @enderror" />
            <div class="input-group-append">
                <span class="input-group-text">{{ $unit_ratio ?? 0 }}</span>
            </div>
        </div>

    </div>
</div>
