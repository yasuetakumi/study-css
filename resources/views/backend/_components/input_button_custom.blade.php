<div class="card-footer text-center">
    <button type="submit" class="btn btn-secondary" id="input-submit">
        @if(isset($icon) && $icon)
            <i class="fas fa-{{ $icon }}"></i>
        @else
            <i class="fas fa-save"></i>
        @endif
        {{ $label }}
    </button>
    {{ $slot }}
</div>
