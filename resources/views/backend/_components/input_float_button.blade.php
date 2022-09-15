<div class="wrapper-float-btn">
    <button role="button" id="input-submit" type="submit" class="float-btn bg-secondary">
        <i class="fas fa-save mr-1"></i> {{ $page_type == 'create' ? __('label.register') : __('label.update')  }}
        {{ $slot }}
    </button>
</div>
