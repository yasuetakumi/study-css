<div id="form-group--password" class="row form-group">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
        <strong class="field-title">
            {{ !empty($caption) ? $caption : __('label.password') }}
            <i class="fa fa-exclamation-circle tooltip-img" data-toggle="tooltip" data-placement="right" title="@lang('label.choosePasswordLength')"  style="font-size: 16px;"></i>
        </strong>
        <span class="label-attach optional">@lang('label.optional')</span>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1 col-content">
        {{-- Code logic on _base/content_form.blade.php like "$('#reset-button').click( ..." --}}
        <button type="button" name="reset" id="reset-button" class="btn btn-outline-info">@lang('label.change')</button>
    </div>
    <div id="reset-field" class="col-xs-10 col-sm-10 col-md-8 col-lg-9 col-content d-none">
        <input data-parsley-required-message="@lang('validation.required', ['attribute' => __('label.password')])" type="password" id="input-password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old("password") }}" data-parsley-minlength="8" />
        <label for="show-password">
            <input id="show-password" type="checkbox" name="show-password" value="1">
            <span>@lang('label.showPassword')</span>
        </label>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">

    </div>
</div>
