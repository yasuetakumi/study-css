<div id="form-group--password" class="row form-group">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
        <strong class="field-title">
            {{ !empty($caption) ? $caption : __('label.password') }}
            <i class="fa fa-exclamation-circle tooltip-img" data-toggle="tooltip" data-placement="right" title="@lang('label.choosePasswordLength')" style="font-size: 16px;"></i>
        </strong>

        <span class="label-attach required">@lang('label.required')</span>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <input data-parsley-required-message="@lang('validation.required', ['attribute' => __('label.password')])" type="password"
        id="input-password" name="password" class="form-control @error('password') is-invalid @enderror"
        value="{{ old("password") }}" required data-parsley-minlength="8"
        data-parsley-minlength-message="@lang('validation.min.string', ['attribute' => __('label.password'), 'min' => 8])"/>
    </div>
</div>
