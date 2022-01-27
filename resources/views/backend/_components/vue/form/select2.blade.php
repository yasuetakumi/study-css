<div id="form-group--{{ $name }}" class="row form-group">


    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
        <strong class="field-title">{{ $label }}</strong>
        @if( $required !== 'false' )
            <span class="label-attach required">@lang('label.required')</span>
        @else
            <span class="label-attach optional">@lang('label.optional')</span>
        @endif
    </div>

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <div class="field-group clearfix">
        <Select2

            @if(isset($id)) id="{{ $id }}" @endif
            @if(isset($id_vue)) :id="{{ $id_vue }}" @endif
            @if(isset($name)) name="{{ $name }}" @endif
            label="{{ $label }}"
            data-parsley-trigger="change focusout"

            :options="{{ $options }}"

            :settings="{'language': { 'noResults': function(){ return '一致する検索結果がありません';}}}"

            @if(isset($function)) @change="{{ $function }}" @else @change="refreshParsley" @endif

            @if(isset($model)) v-model="{{ $model }}" @endif
            @if(isset($placeholder)) placeholder="{{ $placeholder }}" @endif
            @if(isset($required)) :required="{{ $required }}" @endif
            @if(isset($disabled) && $disabled == true) :disabled="{{ $disabled }}" @endif

            @if(isset($model)) :value="{{ $model }}" @endif

            {{ $slot }}
            >
            <span slot="no-options">対象のレコードはありません。</span>

        </Select2>
        </div>
    </div>
</div>
