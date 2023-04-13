<div class="form-item input-group mb-2">
    <span class="field-name input-group-text" for="{{ $name }}" id="{{ $name }}-inp">
        {{ $title }}
    </span>
    {{ $slot }}
    @error ($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>