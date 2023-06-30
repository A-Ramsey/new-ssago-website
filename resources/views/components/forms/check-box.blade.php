<div class="form-check @if($isSwitch) form-switch @endif">
    @if($heading != False)
        <h3>{{ $heading }}</h3>
    @endif

    <input class="field @error($name) is-invalid @enderror form-check-input" 
        name="{{ $name }}" id="{{ $name }}" 
        type="checkbox"
        @if(old($name, $checked)) checked @endif
        @if($isRequired) required @endif
        @if($isDisabled) disabled @endif
        placeholder="{{ $title }}" aria-describedby="{{ $name }}-inp" />
    <label class="form-check-label" for="{{ $name }}">
        &nbsp;{{ $title }}
    </label>
    @error ($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>