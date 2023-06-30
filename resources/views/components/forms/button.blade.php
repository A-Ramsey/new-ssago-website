<div class="form-item input-group mb-2 d-flex justify-content-center">
    <button class="{{ $name }} btn @if($isDanger) btn-danger @else btn-primary @endif" id="{{ $name }}"
        @if($isSubmit) type="submit" @else type="button" @endif
        @if($isDisabled) disabled @endif
    >{{ $title }}</button>
    @error ($name)
        <p class="form-err">{{ $message }}</p>
    @enderror
</div>